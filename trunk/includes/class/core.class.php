<?
include_once(CONFIG_DOCUMENT_ROOT.'includes/class/ez_sql.class.php');
include_once(CONFIG_DOCUMENT_ROOT.'includes/class/session.class.php');

abstract class Core {

	public $db; // Objeto de base de datos
	private $_error = '';
	private $_debug = array();
	private $_db_debug = false;

	function __construct () {
		// Creo la conexion a la base de datos
		$this->db = new ez_sql(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		// Inicializo la sesion
		$this->Session = new Session();

		/*
		
		// Creo una conexion al comet server
		$this->comet = Meteor::getInstance();
		// Pruebo si me pudo conectar al servidor comet
		if (!$this->comet || !$this->comet->connect())
			$this->comet = null;
		
		*/
	}

	/**
	 * Setea las opciones 
	 * 
	 * @param array $default Array de opciones por defecto de la clase que llamo a este metodo
	 * @param array $opciones (opcional) Opciones validas para la clase que lo llamo. Si esta vacio, funciona como un getter.
	 * @return array $opciones Listado de opciones
	 */
	public function opciones ($default=null, $opciones=null) {

		if (!$default)
			return false;

		if ($opciones && is_array($opciones)) 
			foreach ($opciones as $k => $v)
				if (isset($default[$k]))
					$default[$k] = $v;
		return $default;
	}

	function str_to_url($str) {
		$arr_to_replace = array (
			' '		=> '-',
			', '	=> '-',
			'/'		=> '-',
			','		=> ' '
		);

		return urlencode(str_replace(array_keys($arr_to_replace), array_values($arr_to_replace), $str));
	}

	/**
	 * Setea el debug para cualquier query en el objeto de base de datos 
	 * 
	 * @param boolean $debug Si esta habilitado o no
	 * @return boolean
	 */
	public function db_debug ($debug) {
		return $this->db->debug = $debug;
	}

	/*
	* Descripcion: Setter/getter del mensaje de error
	* Params: String, 
	* Return: String
	*/
	function error($msg=null) {
		if ($msg)
			$this->_error = $msg;
		return $this->_error;
	}

	/*
	* Descripcion: Setea o devuelve informacion de debug
	* Params: String
	* Return: String
	*/
	function debug($set=false) {
		if ($set) {
			// Obtengo la clase y metodo que me llamo
			$debug = debug_backtrace(true);
			$caller = $debug[1];
			$file = end($debug);
			// Almaceno la informacion de debug
			$this->_debug = array(
				'Date' => '['.date("Y-m-d H:i:s").']',
				'Class' => $caller['file'].': '.$caller['line'],
				'File' => $file['file'].': '.$file['line'],
				'Object' => $file['class'].'->'.$file['function'].'('.implode(',', $file['args']).')',
				'Last Error' => $this->error()
			);
		}
		return $this->_debug;
	}

	/*
	* Descripcion: Setea un mensaje de error y devuelve false
	* Params: int, int, tinyint
	* Return: (bool)
	*/
	protected function fail ($msg=null) {
		// Almaceno el mensaje de error
		$msg = ($msg)? $msg : 'Error no especificado';
		// Seteo el error
		$this->error($msg);
		// Seteo la informacion de debug
		$this->debug(true);

		return false;
	}

	function print_r($el) {
		echo '<pre>'.print_r($el, true).'</pre>';
	}

}

?>
