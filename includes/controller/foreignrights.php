<?

$year = date('Y');
$Novedades = new Novedades();
$noticias = $Novedades->listar(
        array(
                'filtros' => array('year' => 'EXTRACT(YEAR FROM n.ctime) = ' . $year),
                'order' => array('n.ctime', 'DESC'),
                'rpp' => 2
        )
);

/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/foreignrights.tpl.php');
include('includes/tpl/footer.tpl.php');

?>
