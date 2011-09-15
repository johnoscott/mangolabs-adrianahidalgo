<?

/**
 * Usuario class
 *
 * Esta clase gestiona las acciones de un usuario (login, logout, etc)
 * @author Alejandro Garcia del Rio <alejandro.garciadelrio@elserver.com>
 * @version 1.0
 * @package Usuario
*/
class Usuario extends Core {

	static protected $instancia;
	static protected $opciones = array();
	static private $expires = 5400; // Tiempo en el que expira la sesion del usuario sso en segundos (default 1.30hs)
	static private $token = null;

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
	 * Loguea un usuario
	 * 
	 * @param string $user Usuario
	 * @param string $pass Password del usuario
	 * @return boolean
	 */
	public function login ($user, $pass) {

		// Saneamiento de variables
		$user = addslashes($user);
		$pass = addslashes($pass);
		
		// Obtengo el objeto de base de datos
		$db = ($this)? $this->db : ez_sql::getInstance();

		// Busco el user/pass en la base de datos
		if (!($data = $db->get_row("SELECT * FROM usuarios WHERE user = '$user' AND pass = MD5('$pass')")))
			return $this->fail('Usuario o clave incorrectos');

		// Obtengo un objeto de sesion
		$Session = ($this)? $this->Session : Session::getInstance();

		// Almaceno la informacion del usuario
		$usuario = array(
			'id' 		=> $data['id_usuario'],
			'user' 		=> $data['user'], 
			'nombre' 	=> $data['nombre'], 
			'lastlogin' => time(),
		);

		// Guardo los datos en la sesion
		$Session->set('usuario', $usuario);

		return true;
	}

	/**
	 * Devuelve si un usuario esta logueado o no
	 * 
	 * @return boolean
	 */
	public function logged () {

		// Obtengo un objeto de sesion
		$Session = ($this)? $this->Session : Session::getInstance();

		// Tiene que tener seteado el usuario.id
		if (!$Session->get('usuario.id')) {
			return ($this)? $this->fail('No estas logueado') : false;
		}

		return true;
	}

	/**
	 * Desloguea a un usuario
	 * 
	 * @return boolean
	 */
	public function logout () {
		
		// Obtengo un objeto de sesion
		$Session = ($this)? $this->Session : Session::getInstance();

		// Borro la informacion del usuario de la sesion
		$Session->del('usuario');
		
		return true;

	}

}
 
?>
