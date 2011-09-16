<?


/* Defino los criterios de busqueda
*************************************************************/

$criterios = array(
	"coleccion" => array(
		"filtro" => "id_coleccion = '|param|'"
	),
	"autor" => array(
		"filtro" => "id_autor = '|param|'"
	),
	"genero" => array(
		"filtro" => "id_genero = '|param|'"
	),
	"titulo" => array(
		"filtro" => "titulo LIKE '%|param|'"
	)
);



/* Recibo los datos
*************************************************************/

if ($_REQUEST['params']) {

	// Parametros
	$params = array($section => addslashes($_REQUEST['params']));
	
	// Guardo el parametro en sesion
	$_SESSION['params'] = $params;
	
	# print_r($params);
	
	// Aplico los filtros
	foreach ($criterios as $key_criterio => $value_criterio)
		if ($params[$key_criterio])
			$filtros[$key_criterio] = str_replace('|param|', $params[$key_criterio], $value_criterio['filtro']);

	// Armo las opciones para la funcion listar
	$opciones  = array(
		'rpp' => ($params['items']) ? $params['items'] : 100,
		'page' => ($params['pagina']) ? $params['pagina'] : 1,
		'filtros' => $filtros
	);
	
	# print_r($opciones);

	// Descomentar cuando la funcion exista
	// $libros = Libros::listar($opciones);

	$libros = $books;
	
}




/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/catalogo.tpl.php');
include('includes/tpl/footer.tpl.php');

?>