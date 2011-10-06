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

// Obtengo el autor
$autor = Autores::get($libro['id_autor']);

// Preparo las cabeceras
switch ($section) {
    case 'autor':
		$cabeceras = $autor;
        break;
    case 'genero':
        $cabeceras = Generos::listar(array('filtros' => array('id_genero = ' . $params['genero'])));
        break;
    case 'coleccion':
        $cabeceras = Colecciones::listar(array('filtros' => array('id_coleccion = ' . $params['coleccion'])));
        break;
}
$cabeceras = current($cabeceras);
$autor = current($autor);

/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/detalle.tpl.php');
include('includes/tpl/footer.tpl.php');

?>