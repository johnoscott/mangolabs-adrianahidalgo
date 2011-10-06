<?

$Libros = new Libros();
$listado = $Libros->listar(array('filtros' => array("l.home = '1'")));

/* Incluyo la interfaz
*************************************************************/
require('includes/tpl/header.tpl.php');
require('includes/tpl/inicio.tpl.php');
require('includes/tpl/footer.tpl.php');

?>
