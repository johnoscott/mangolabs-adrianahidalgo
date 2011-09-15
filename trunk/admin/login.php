<?

include('includes/loader.inc.php');

$usuario = new Usuario();

// Si ya esta logueado, lo mando a la home
if ($usuario->logged()) {
	header("Location: /sic/home");
	exit;
}

if (!empty($_POST)) {

	$user = addslashes($_POST['user']);
	$pass = addslashes($_POST['pass']);

	if (empty($user) or empty($pass)) {
		$error = 'Por favor, completa todos los datos.';
	} else {
		if(!$usuario->login($user, $pass)) {
			$error = 'Error: ' . $usuario->error();
		} else {
			// Lo enviamos a Home
			header("Location: ".$_SERVER["HTTP_REFERER"]);
			exit;
		}
	}
}

include('includes/tpl/login.tpl.php');
?>
