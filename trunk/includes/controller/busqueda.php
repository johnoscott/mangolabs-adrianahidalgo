<?


/* Defino los criterios de busqueda
*************************************************************/

$criterios = array(
	"titulo" => array(
		"filtro" => "l.titulo LIKE '%|param|%'"
	)
);


/* Recibo los datos
*************************************************************/

if ($_POST['search']) {
	header("Location: /web/busqueda/titulo/".$_POST['search']);
	exit;
}

if ($_REQUEST['params']) {
	$params = array($section => addslashes($_REQUEST['params']));
	$listar = true;
}



/* Defino las secciones
*************************************************************/

switch ($section) {
	case 'titulo':
		$listar = true;
		$letras = Libros::letras();
		$params['titulo'] = ($params['titulo']) ? $params['titulo'] : current($letras);
		break;
	case 'autor':
		$letras = Autores::letras();
		$params['autor'] = ($params['autor']) ? $params['autor'] : current($letras);
		$autores = Autores::listar($opciones);
		break;
	case 'genero':
		$generos = Generos::listar();
		$params['genero'] = ($params['genero']) ? $params['genero'] : current($generos);
		break;
	case 'coleccion':
		$colecciones = Colecciones::listar();
		$params['coleccion'] = ($params['coleccion']) ? $params['coleccion'] : current($colecciones);
		// Marcamos si es Pipala
		if ($params['coleccion'] == 16)
			$pipala = true;
		break;
}


// Guardo el parametro en sesion
$_SESSION['params'] = $params;

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

// Obtengo el listado correspondiente
if ($listar)
	$libros = Libros::listar($opciones);


/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/busqueda.tpl.php');
include('includes/tpl/footer.tpl.php');

?>
