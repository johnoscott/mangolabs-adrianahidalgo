<?  include('../includes/loader.inc.php');

$usuario = Usuario::getInstance();

$usuario->logout();

header("Location: /admin/");
exit;

?>
