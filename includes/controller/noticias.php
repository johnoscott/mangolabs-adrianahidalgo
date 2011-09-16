<?

/* Obtengo los datos
*************************************************************/



	
	


if ($_REQUEST['params']) {

	/* Detalle de noticia
	********************************************************/
	
	// Tomo el id
	$id = addslashes($_REQUEST['params']);
	// Descomentar cuando la funcion exista
	// $noticias = Noticias::get($id);
	$noticia = $noticias_ejemplo[$section][$id];

} else {

	/* Listado de noticias
	********************************************************/
	
	// Armo las opciones para la funcion listar
	$opciones  = array(
		'rpp' => ($params['items']) ? $params['items'] : 100,
		'page' => ($params['pagina']) ? $params['pagina'] : 1,
		'filtros' => array('anio' => 'anio = ' . $section)
	);

	# print_r($opciones);

	// Descomentar cuando la funcion exista
	// $noticias = Noticias::listar($opciones);

	$noticias = $noticias_ejemplo[$section];

}




/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/noticias.tpl.php');
include('includes/tpl/footer.tpl.php');

?>