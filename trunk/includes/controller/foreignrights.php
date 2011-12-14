<?

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
include('includes/tpl/header.tpl.php');
include('includes/tpl/foreignrights.tpl.php');
include('includes/tpl/footer.tpl.php');

?>
