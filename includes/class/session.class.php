<?

class Session {

	static protected $instancia;
	private $flash_varname = 'error_msg';
	static protected $ctx = 'bbd9d3fed3695c722fa359796d1cbecb';
	static private $path = null;
	//private $Session;

    function __construct () { 
		session_name('PHPSESS');
		session_set_cookie_params((3600*24*365), '/', CONFIG_SITE_DOMAIN); // Session valida por 1 ano
		self::$path = CONFIG_DOCUMENT_ROOT.'tmp/sessions';
		if ( ($path = self::$path) && (is_dir($path)) )
			session_save_path($path);
		@session_start();
		$this->Session = &$_SESSION;  
		
		// Guardo el contexto de elserver
		$this->set('ctx', self::$ctx);

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

	public function del ($key) {
		unset($this->Session[$key]);
		//$this->Session = &$_SESSION;
	}

	public function id () {
		return session_id();
	}

	public function set ($key, $val) {
		$this->Session[$key] = $val;
		return $this->Session[$key];
	}

	public function get ($key) {
		$ret = false;
		$keys = explode('.', $key);
		for (	$keys = explode('.', $key), $k = current($keys),$arr = $this->Session; 
				$k && ($ok = isset($arr[$k])); 
				$ret = $arr = $arr[$k], $k = next($keys));
		return ($ok)? $ret : false;
	}

	public function getAll () {
		//return $this->Session;
		return $_SESSION;
	}

	public function setFlash ($msg) {
		if($res != '')
			$msg = $res;
		return $this->set($this->flash_varname, $msg);
	}
	
	public function getFlash () {
		$res = $this->get($this->flash_varname);
		$this->del($this->flash_varname);
		return $res;
	}
	
}

?>
