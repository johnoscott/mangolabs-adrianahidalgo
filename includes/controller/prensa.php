<?


/* Recibo los datos
*************************************************************/

if ($_REQUEST['params']) {
	$params = array($section => addslashes($_REQUEST['params']));
	$listar = true;
}



/* Defino las secciones
*************************************************************/

$Prensa = new Prensa();

$prensas = $Prensa->listar();

// Guardo el parametro en sesion
$_SESSION['params'] = $params;

// Armo las opciones para la funcion listar
$opciones  = array(
	'rpp' => ($params['items']) ? $params['items'] : 100,
	'page' => ($params['pagina']) ? $params['pagina'] : 1,
	'filtros' => $filtros
);



/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/prensa.tpl.php');
include('includes/tpl/footer.tpl.php');

?>
