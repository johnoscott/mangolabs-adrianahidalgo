<?

$Libros = new Libros();
$listado = $Libros->listar(
	array(
		'filtros' => array("l.home = '1'", "l.id_coleccion != 16"),
		'order' => array(array('l.ctime', 'DESC'), array('l.titulo', 'DESC')),
		'rpp' => 4
	)
);
$pipalas = $Libros->listar(
	array(
		'filtros' => array("l.home = '1'", "l.id_coleccion = 16"),
		'order' => array(array('l.ctime', 'DESC'), array('l.titulo', 'DESC')),
		'rpp' => 3
	)
);
$reediciones = $Libros->listar(
	array(
		'filtros' => array("l.reedicion = 1"),
		'order' => array(array('l.ctime', 'DESC'), array('l.titulo', 'DESC')),
		'rpp' => 4
	)
);

$year = date('Y');
$Novedades = new Novedades();
$noticias = $Novedades->listar(
	array(
		'filtros' => array('year' => 'EXTRACT(YEAR FROM n.ctime) = ' . $year),
		'rpp' => 2
	)
);

/* Incluyo la interfaz
*************************************************************/
require('includes/tpl/header.tpl.php');
require('includes/tpl/inicio.tpl.php');
require('includes/tpl/footer.tpl.php');

?>
