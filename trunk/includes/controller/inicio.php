<?

$books = array(
	array('title' => 'Animal Farm', 'author' => 'George Orwell', 'year' => '1985', 'comment' => 'All times classic', 'rating' => '5', 'price' => 79),
	array('title' => 'The Dead Zone', 'author' => 'Stephen King', 'year' => '1979', 'comment' => 'A must read', 'rating' => '4', 'price' => 79),
	array('title' => 'Harry Potter and the Deadly Hollows', 'author' => 'J. K. Rowling', 'year' => '2007', 'comment' => 'The saga\'s great end',  'rating' => '4', 'price' => 79),
	array('title' => 'Second Foundation', 'author' => 'Isaac Asimov', 'year' => '1953', 'comment' => 'The science fiction epic novel', 'rating' => '3', 'price' => 79),
	array('title' => 'The Adventures of Tom Sawyer', 'author' => 'Mark Twain', 'year' => '1876', 'comment' => 'The great journey', 'rating' => '5', 'price' => 79),
	array('title' => 'The Black Cat', 'author' => 'Edgar Allan Poe', 'year' => '1843', 'comment' => 'The masterpiece of Poe', 'rating' => '5', 'price' => 79),
	array('title' => 'Murder on the Orient Express', 'author' => 'Agatha Christie', 'year' => '1934', 'comment' => 'The mistery begins', 'rating' => '5', 'price' => 79),
	array('title' => 'The Plague', 'author' => 'Albert Camus', 'year' => '1947', 'comment' => 'A great novel', 'rating' => '3', 'price' => 79)
);

$Libros = new Libros();
$books = $Libros->listar(array('filtros' => array("l.home = '1'")));

/* Incluyo la interfaz
*************************************************************/
require('includes/tpl/header.tpl.php');
require('includes/tpl/inicio.tpl.php');
require('includes/tpl/footer.tpl.php');

?>
