<? include('includes/loader.inc.php'); 

// Instancio prensa
$Prensa = new Prensa();

// Obtengo la nota de prensa
$prensa = $Prensa->get($_GET['id']);

// Imprimo el texto
echo htmlentities($prensa['comentario']);

?>
