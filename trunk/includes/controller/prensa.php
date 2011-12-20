<?


/* Recibo los datos
*************************************************************/


if ($_REQUEST['params']) {
	$params = array($section => addslashes($_REQUEST['params']));
	$listar = true;
}



/* Defino las secciones
*************************************************************/

/*
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
*/

$Prensa = new Prensa();

if ($_REQUEST['params']) {

	/* Detalle de noticia
	********************************************************/
	
	// Tomo la noticia
	$id = addslashes($_REQUEST['params']);
	$prensa = $Prensa->get($id);
//	$prensa = current($prensa);

} else {

	/* Listado de noticias
	********************************************************/
	
	$prensas = $Prensa->listar();

	// Guardo el parametro en sesion
	$_SESSION['params'] = $params;

	// Armo las opciones para la funcion listar
	$opciones  = array(
		'rpp' => ($params['items']) ? $params['items'] : 100,
		'page' => ($params['pagina']) ? $params['pagina'] : 1,
		'filtros' => $filtros
	);

	// $noticias = $noticias_ejemplo[$section];

}



/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/prensa.tpl.php');
include('includes/tpl/footer.tpl.php');

?>
