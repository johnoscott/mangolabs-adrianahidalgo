<?

/* Obtengo los datos
*************************************************************/

if ($_REQUEST['id'])
	$id = addslashes($_REQUEST['id']);

// Obtengo los datos del libro
$Libros = new Libros();
$libro = $Libros->get($id);

// Chequeo la seccion
if ($_GET['destacado'])
	$section = 'titulo';
$section = ($sections['catalogo']['sub'][$section]) ? $section : 'coleccion';

// Obtengo los parametros
$params = $_SESSION['params'];

// Preparo las cabeceras
$cabeceras = ${$section};

// Marco si es un libro de Pipala
if ($libro['id_categoria'] == 1)
	$pipala = true;

/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/detalle.tpl.php');
include('includes/tpl/footer.tpl.php');

?>