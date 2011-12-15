<?

/**
 * Autores class
 *
 * Esta clase gestiona los autores
 * @author Alejandro Garcia del Rio <alejandro.garciadelrio@elserver.com>
 * @version 1.0
 * @package Autores
*/
class Autores extends Core {

	static protected $instancia;
	static protected $opciones = array(
		'rpp' => 20000000, // Resultados por pagina 
		'filtros' => array(), // Filtros para la funcion listar
		'page' => 1, // Numero de pagina por defecto
		'order' => array('a.nombre', 'DESC') // Ordenamiento de listar() con el tipo de ordenamiento (opcional)
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
	 * Devuelve un autor
	 * 
	 * @param integer $id_autor El id de autor que se quiere obtener
	 * @return array
	 */
	public function get ($id_autor) {
		
		// Saneamiento de variables 
		$id_autor = addslashes($id_autor);
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Busco el autor solicitado
		$filtros = array('filtros' => array("id_autor = '$id_autor'"), 'rpp' => 1);
		$autor = ($this)? $this->listar($filtros) : Autores::listar($filtros);

		return $autor;
	}

	/**
	 * Devuelve el listado de autores
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
		$query = "SELECT SQL_CALC_FOUND_ROWS a.id_autor, a.nombre
				FROM autores a
				WHERE 1=1 $and
				" . ($order? 'ORDER BY '.substr($order_by, 1) : '') . 
				" LIMIT " . (($opciones['page'] - 1) * $opciones['rpp']) . ", " . $opciones['rpp'];
		
		// Obtengo el listado de libros
		$autores = array();
		if ($_autores = $db->get_results($query))
			foreach ($_autores as $_autor)
				$autores[$_autor['id_autor']] = $_autor;	
				
		return $autores;
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
	
	/**
	 * Devuelve todas las letras iniciales de los autores
	 * 
	 * @return array
	 */
	public function letras () {
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Obtengo todas las letras de los autores
		$letras = $db->get_col("SELECT LEFT(nombre, 1) letra FROM autores WHERE 1=1 GROUP BY letra ORDER BY letra");

		return array_values($letras);
	}

}

?>
