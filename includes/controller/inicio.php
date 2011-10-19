<?

$Libros = new Libros();
$listado = $Libros->listar(
	array(
		'filtros' => array("l.home = '1'"),
		'rpp' => 6
	)
);

$Novedades = new Novedades();
$noticias = $Novedades->listar(
	array(
		'rpp' => 2
	)
);

/* Incluyo la interfaz
*************************************************************/
require('includes/tpl/header.tpl.php');
require('includes/tpl/inicio.tpl.php');
require('includes/tpl/footer.tpl.php');

?>
