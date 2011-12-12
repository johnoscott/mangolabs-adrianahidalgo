<? 

error_reporting(E_ERROR | E_PARSE);
//error_reporting(E_ALL);

header("Content-Type: text/html; charset=utf-8");

// Incluyo el archivo de configuracion
include_once(dirname(__FILE__).'/config.inc.php');

function __autoload($classname) {
	// La convierto a su equivalente en archivo (camelcase to underscore)
	$classname = strtolower(preg_replace('/([a-z])([A-Z])/e', "'\\1'.'_'.strtolower('\\2')", $classname));
	// Incluyo la clase
    include CONFIG_DOCUMENT_ROOT.'includes/class/'.$classname.'.class.php';
}


// Inicio la base de datos
$db = ez_sql::getInstance();

// Inicio la sesion
$Session = Session::getInstance();

// Defino algunas configuraciones para el admin
$admin = array (
	'secciones' => array ( 
		'autores' 		=> '/admin/autores/',
		'colecciones' 	=> '/admin/colecciones/',
		'libros' 		=> '/admin/libros/',
		'prensa' 		=> '/admin/prensa/',
		'generos' 		=> '/admin/generos/',
		'novedades' 	=> '/admin/novedades/',
	),
);

$Usuario = Usuario::getInstance();

// Si me mando el pais lo seteo
if (isset($_GET['country']) && ($_GET['country'] == 'es'))
	$Session->set('country', 'es');
// Pais por defecto: argentina
if (!$Session->get('country'))
	$Session->set('country', 'ar');

?>
