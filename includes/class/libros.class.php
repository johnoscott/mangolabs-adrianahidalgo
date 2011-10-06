<?

/**
 * Libros class
 *
 * Esta clase gestiona los libros
 * @author Alejandro Garcia del Rio <alejandro.garciadelrio@elserver.com>
 * @version 1.0
 * @package Libros
*/
class Libros extends Core {

	static protected $instancia;
	static protected $opciones = array(
		'rpp' => 20, // Resultados por pagina 
		'filtros' => array(), // Filtros para la funcion listar
		'page' => 1, // Numero de pagina por defecto
		'order' => array('l.titulo', 'DESC') // Ordenamiento de listar() con el tipo de ordenamiento (opcional)
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
	 * Devuelve un libro
	 * 
	 * @param integer $id_libro El id de libro que se quiere obtener
	 * @return array
	 */
	public function get ($id_libro) {
		
		// Saneamiento de variables 
		$id_libro = addslashes($id_libro);
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Inicializo el objeto que voy a devolver
		$libro = array();
		
		// Busco el libro solicitado
		$datos = $this->listar(array('filtros' => array("l.id_libro = '$id_libro'"), 'rpp' => 1));
		
		//$db->debug();
		
		// Obtengo las notas de prensa de este libro
		$prensa = $this->prensa($id_libro);

		return array_merge(current($datos), array('prensa' => $prensa));
	}

	/**
	 * Devuelve las notas de prensa de un libro
	 * 
	 * @param integer $id_libro El id de libro del que se quiere las notas de prensa
	 * @return array
	 */
	public function prensa ($id_libro) {
		
		// Saneamiento de variables 
		$id_libro = addslashes($id_libro);
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Busco las notas de prensa
		$prensa = $db->get_results("SELECT p.* FROM prensa p WHERE id_libro = '$id_libro'");

		return $prensa;
	}

	/**
	 * Devuelve el listado de libros
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
		$query = "SELECT SQL_CALC_FOUND_ROWS l.*, a.nombre autor
				FROM libros l
				LEFT JOIN autores a ON l.id_autor = a.id_autor
				WHERE 1=1 $and
				" . ($order? 'ORDER BY '.substr($order_by, 1) : '') . 
				" LIMIT " . (($opciones['page'] - 1) * $opciones['rpp']) . ", " . $opciones['rpp'];
		
		// Obtengo el listado de libros
		$libros = array();
		if ($_libros = $db->get_results($query))
			foreach ($_libros as $_libro)
				$libros[$_libro['id_libro']] = $_libro;

		//$db->debug();		
				
		return $libros;
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
	 * Devuelve todas las letras iniciales de los libros
	 * 
	 * @return array
	 */
	public function letras () {
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Obtengo todas las letras de los autores
		$letras = $db->get_col("SELECT LEFT(titulo, 1) letra FROM libros WHERE 1=1 GROUP BY letra ORDER BY letra");

		return array_values($letras);
	}

}

?>
