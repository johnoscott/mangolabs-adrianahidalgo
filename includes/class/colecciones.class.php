<?

/**
 * Colecciones class
 *
 * Esta clase gestiona las colecciones
 * @author Alejandro Garcia del Rio <alejandro.garciadelrio@elserver.com>
 * @version 1.0
 * @package Colecciones
*/
class Colecciones extends Core {

	static protected $instancia;
	static protected $opciones = array(
		'rpp' => 20, // Resultados por pagina 
		'filtros' => array(), // Filtros para la funcion listar
		'page' => 1, // Numero de pagina por defecto
		'order' => array('c.orden', 'ASC') // Ordenamiento de listar() con el tipo de ordenamiento (opcional)
	);
	private $count = 0;
	private $paginas = 0;

	function __construct ($opciones=null) {
		// Llamo al constructor del parent tambien
		parent::__construct();
		// Seteo las opciones
		if ($opciones)
			$this->opciones($opciones);
	}

	/**
	 * Devuelve una unica instancia de esta clase
	 * 
	 * @return object Instancia de esta clase
	 */
	public static function getInstance() {
		if (!self::$instancia instanceof self)
			self::$instancia = new self;
		return self::$instancia;
	}

	/**
	 * Setea las opciones 
	 * 
	 * @param array $opciones (opcional) Opciones validas para esta clase. Si esta vacio, funciona como un getter.
	 * @return array $opciones Listado de opciones
	 */
	public function opciones ($opciones=null) {
		return self::$opciones = parent::opciones(self::$opciones, $opciones);
	}

	/**
	 * Devuelve una coleccion
	 * 
	 * @param integer $id_coleccion El id de la coleccion que se quiere obtener
	 * @return array
	 */
	public function get ($id_coleccion) {
		
		// Saneamiento de variables 
		$id_coleccion = addslashes($id_coleccion);
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Busco el autor solicitado
		$coleccion = ($this) ?  $this->listar(array('filtros' => array("id_coleccion = '$id_coleccion'"), 'rpp' => 1)) : Colecciones::listar(array('filtros' => array("id_coleccion = '$id_coleccion'"), 'rpp' => 1));

		return $coleccion;
	}

	/**
	 * Devuelve el listado de colecciones
	 * 
	 * @param array $opciones (Opcional) Opciones validas para esta clase.
	 * @return array
	 */
	public function listar ($opciones=null) {

		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Seteo las opciones
		$opciones = ($this instanceof self)? $this->opciones($opciones) : self::opciones($opciones);

		// Armo el order by 
		$order = $opciones['order']; $order_by = '';
		if ( !is_array($order) || (count($order) == 1) || ((count($order) == 2) && (preg_match('/desc|asc/i', $order[1]))) )
			$order = array($order);

		if ($order)
			foreach ($order as $o) 
				$order_by .= ", ".(is_array($o)? $o[0].' '.$o[1] : $o);

		// Agrego los filtros opcionales
		if (is_array($opciones['filtros'])) {
			foreach ($opciones['filtros'] as $key => $filtro) {
				if ($filtro) {
					$and .= " AND " . $filtro;
				}
			}
		}

		// Busco los productos
		$query = "SELECT SQL_CALC_FOUND_ROWS c.*
				FROM colecciones c
				WHERE 1=1 $and
				" . ($order? 'ORDER BY '.substr($order_by, 1) : '') . 
				" LIMIT " . (($opciones['page'] - 1) * $opciones['rpp']) . ", " . $opciones['rpp'];
		
		// Obtengo el listado de libros
		$colecciones = array();
		if ($_colecciones = $db->get_results($query))
			foreach ($_colecciones as $_coleccion)
				$colecciones[$_coleccion['id_coleccion']] = $_coleccion;

		return $colecciones;
	}

	/**
	 * Devuelve la cantidad de paginas que devolvio la consulta
	 * 
	 * Los resultados son cargados previamente por la funcion listar
	 * @param array $count (Opcional) Cantidad total se resultados
	 * @param array $rpp (Opcional) Cantidad de resultados por pagina
	 * @return integer Cantidad de resultados
	 */
	public function paginas ($count=null, $rpp=null) {

		$rpp = (!$rpp)? self::$opciones['rpp'] : $rpp;
		$count = (!$count && $this instanceof self)? $this->count() : $count;

		// No se puede dividir por 0
		if ($rpp == 0)
			return 0;

		return ceil($count/$rpp);
	}
	
	
	/**
	 * Devuelve cuantos resultados hay en la consulta
	 * 
	 * Los resultados son cargados previamente por la funcion listar
	 * @return integer Cantidad de resultados
	 */
	public function count () {
		return $this->count;
	}
	
}

?>
