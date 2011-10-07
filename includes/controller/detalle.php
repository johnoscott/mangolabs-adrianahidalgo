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

// Obtengo los detalles
$autor = Autores::get($libro['id_autor']);
$genero = Genero::get($libro['id_genero']);
$coleccion = Coleccion::get($libro['id_coleccion']);
$libro['autor'] = current($autor);
$libro['genero'] = current($genero);
$libro['coleccion'] = current($coleccion);

// Preparo las cabeceras
switch ($section) {
    case 'autor':
		$cabeceras = $autor;
        break;
    case 'genero':
        $cabeceras = $genero;
        break;
    case 'coleccion':
        $cabeceras = $coleccion;
        break;
}
$cabeceras = current($cabeceras);

/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/detalle.tpl.php');
include('includes/tpl/footer.tpl.php');

?>