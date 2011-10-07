<?

/* Obtengo los datos
*************************************************************/




if ($_REQUEST['params']) {

	/* Detalle de noticia
	********************************************************/
	
	// Tomo la noticia
	$id = addslashes($_REQUEST['params']);
	$noticias = Novedades::get($id);
	$noticia = current($noticias);

} else {

	/* Listado de noticias
	********************************************************/
	
	// Armo las opciones para la funcion listar
	$opciones  = array(
		'rpp' => ($params['items']) ? $params['items'] : 100,
		'page' => ($params['pagina']) ? $params['pagina'] : 1,
		'filtros' => array('year' => 'EXTRACT(YEAR FROM n.ctime) = ' . $section)
	);

	# print_r($opciones);

	// Descomentar cuando la funcion exista
	$noticias = Novedades::listar($opciones);

	// $noticias = $noticias_ejemplo[$section];

}




/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/noticias.tpl.php');
include('includes/tpl/footer.tpl.php');

?>