<? include('includes/loader.inc.php'); 

$Prensa = new Prensa();

echo $Prensa->get($_GET['id']);

?>
