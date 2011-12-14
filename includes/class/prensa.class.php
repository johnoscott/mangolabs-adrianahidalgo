<?

/**
 * Prensa class
 *
 * Esta clase gestiona las notas de prensa institucionales
 * @author Alejandro Garcia del Rio <alejandro.garciadelrio@elserver.com>
 * @version 1.0
 * @package Prensa
*/
class Prensa extends Core {

	static protected $instancia;
	static protected $opciones = array(
		'rpp' => 20, // Resultados por pagina 
		'filtros' => array(), // Filtros para la funcion listar
		'page' => 1, // Numero de pagina por defecto
		'order' => array('p.titulo', 'DESC') // Ordenamiento de listar() con el tipo de ordenamiento (opcional)
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
	 * Devuelve una nota de prensa
	 * 
	 * @param integer $id_prensa El id de la nota de prensa que se quiere obtener
	 * @return array
	 */
	public function get ($id_prensa) {
		
		// Saneamiento de variables 
		$id_prensa = addslashes($id_prensa);
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Busco las notas de prensa
		$prensa = $db->get_row("SELECT p.* FROM prensa p WHERE id_prensa = '$id_prensa'");

		if ($prensa['imagen'])
			$prensa['imagen'] = '/uploads/prensa/'.$prensa['imagen'];

		return $prensa;
	}

	/**
	 * Devuelve el listado de notas de prensa institucionales
	 * 
	 * @param array $opciones (Opcional) Opciones validas para esta clase.
	 * @return array
	 */
	public function listar ($opciones=null) {
				
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Busco las notas de prensa
		$prensa = array();
		if ($_prensas = $db->get_results("SELECT p.* FROM prensa p WHERE id_libro = 0"))
			foreach ($_prensas as $_prensa) {
				$prensa[$_prensa['id_prensa']] = $_prensa;
				if ($_prensa['imagen'])
					$prensa[$_prensa['id_prensa']]['imagen'] = '/uploads/prensa/'.$_prensa['imagen'];
			}

		return $prensa;
	}

}

?>
