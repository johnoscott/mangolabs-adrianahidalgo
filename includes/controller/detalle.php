<?

/* Obtengo los datos
*************************************************************/

if ($_REQUEST['id'])
	$id = addslashes($_REQUEST['id']);

// Descomentar cuando la funcion exista
// $libro = Libros::get($id);

$libro = $book;

// Chequeo la seccion
if ($_GET['destacado'])
	$section = 'titulo';
$section = ($sections['catalogo']['sub'][$section]) ? $section : 'coleccion';

// Preparo las cabeceras
if ($section != 'titulo') {
	$cabecera = array(
		${$sections[$tab]['sub'][$section]['plural']}[current($_SESSION['params'])]['nombre'],
		${$sections[$tab]['sub'][$section]['plural']}[current($_SESSION['params'])]['descripcion']
	);
}

/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/detalle.tpl.php');
include('includes/tpl/footer.tpl.php');

?>