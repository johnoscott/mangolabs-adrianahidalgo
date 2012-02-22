<? include('includes/loader.inc.php');

$Usuario = new Usuario();

// Si no esta logueado, aborto
if (!$Usuario->logged())
	die('No estas validado');

// Array de clases y metodos privados
$private = array(
	'ez_sql' => array(),
	'enom' => array(),
//	'Mail' => array(),
	'CasoLog' => array(),
	'Usuario' => array('enviar_invitacion'),
	'Historial' => array('agregar', 'borrar')
);

$params = array();
$_GLOBALS = array('_GET', '_POST');
foreach ($_GLOBALS as $G)
	if (!empty(${$G}))
		foreach (${$G} as $key => $val)
			$params[$key] = $val;

$vars = explode('&', $q);
foreach ($vars as $p) {
	list($k, $v) = explode('=', $p);
	$params[$k] = $v;
}

//echo '<pre>'.print_r($_GET, true).'</pre>';

if (isset($_GET['class']) && ($_GET['class'] != '')) {
	$args = array();
	$redir = false;

	if (isset($_GET['params']) && !empty($_GET['params']))
		$args = explode('/', $_GET['params']);

	// Si me mandaron parametros por post, los parseo y los paso a la funcion
	if (isset($_POST['params']) && is_array($_POST['params']) && !empty($_POST['params']))
		$args = array_merge($args, $_POST['params']);

	if (isset($_GET['data']) && is_array($_GET['data']) && !empty($_GET['data']))
		$args = array_merge($args, $_GET['data']);

	if (isset($_GET['redir']) && !empty($_GET['redir']))
		$redir = $_GET['redir'];
	unset($args['redir']);

	// Me fijo si la clase/metodo es privada
	if ( isset($private[$_GET['class']]) && ( in_array($_GET['f'], $private[$_GET['class']]) || (is_array($private[$_GET['class']]) && empty($private[$_GET['class']]) ) ) )
		die ('metodo privado');

	$obj = new $_GET['class']();
	$res = call_user_func_array(array($obj, $_GET['f']), $args);
	// Redirecciono
	if ($redir)
		header("Location: ".urldecode($redir).(strstr($redir, '?')? '&' : '?').'ret='.$res);
	// Devuelvo un array serializado
	else if ($_GET['type'] == 'php') 
		echo trim(serialize($res));
	else if ($_GET['type'] == 'htm') {
		echo trim($res);
	}
	// Devuelvo el json
	else if ($_GET['type'] == 'xml') {
//		header("Content-type: application/json; charset=utf-8"); 
		header("Content-type: text/xml; charset=iso-8859-1"); 
		echo trim($res);
	}
	// Devuelvo el json
	else if ($_GET['type'] == 'pdf') {
//		header("Content-type: application/json; charset=utf-8"); 
		header("Content-type: application/pdf; charset=utf-8"); 
		echo trim($res);
	}
	else {
//		header("Content-type: text/xml; charset=iso-8859-1"); 
//		header("Content-Type: application/x-www-form-urlencoded; charset=utf-8"); 
		header("Content-type: application/json; charset=utf-8"); 
//		$res = trim(stripslashes(str_replace(array("\r\n", "\n"), '', $res)));
		echo json_encode($res);
	}

	return;
}






?>
