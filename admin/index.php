<?

include('../includes/loader.inc.php');

//$Session = Session::getInstance();
$usuario = new Usuario();

$error = '';

if (!$_SERVER["HTTP_REFERER"] || (str_replace(CONFIG_SITE_URL, '/', $_SERVER["HTTP_REFERER"]) == $_SERVER["REQUEST_URI"]) )
	$_SERVER["HTTP_REFERER"] = '/admin/home/';

if (!empty($_POST)) {

	$user = addslashes($_POST['user']);
	$pass = addslashes($_POST['pass']);

	if (empty($user) or empty($pass))
		$error = 'Por favor, completa todos los datos.';
	else
		if (!$usuario->login($user, $pass))
			$error = 'Error: ' . $usuario->error();
}

if ($usuario->logged()) {
	// Lo enviamos a Home
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
}

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	
	<title>Login</title>
	
	<!-- JQUERY -->
	<script src="/js/jquery-1.4.4.min.js"></script>	
	
	<!-- JQUERY UI -->
	<script src="/js/jquery-ui-1.8.7.custom.min.js"></script>
	<link type="text/css" href="/css/smoothness/jquery-ui-1.8.7.custom.css" rel="stylesheet" />

	<!-- CSS -->
	<link rel="stylesheet" href="/css/reset.css" type="text/css" />
	<link rel="stylesheet" href="/css/admin.css" type="text/css" />	
	<link rel="stylesheet" href="/css/customizr.css" type="text/css" />
	<link rel="stylesheet" href="/css/960.css" type="text/css" />
	
	<!-- Fonts -->
	<link rel="stylesheet" href="/css/fonts/fonts.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	

	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<link rel="stylesheet" href="/css/ie.css" type="text/css" />
	<![endif]-->
	
</head>

<body class="app-dark">
	
	<div class="login-back"></div>
	<div class="login">
		<form class="edit" method="post" action="/admin/">
			<div class="legend"><h3>Login</h3></div>
			<ul class="list">
				<li><p><label>User: </label></p><p><input type="text" name="user"></p></li>
				<li><p><label>Pass: </label></p><p><input type="password" name="pass"></p></li>
			</ul>
			<?=($error)? '<p class="error">'.$error.'</p>' : ''?>
			<div class="submits"><input class="button" type="submit" value="Ingresar"></div>
		</form>
	</div>

</body>	
	
<script type="text/javascript">

$(function() {
	$('input:first').focus();
});
	
</script>
</html>



