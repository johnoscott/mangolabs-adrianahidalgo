<?

/* Inicio
*************************************************************************************/

session_start();
include('includes/loader.inc.php');


// Incluyo datos ficticios utiles para el desarrollo
include('includes/data.inc.php');







/* Secciones
*************************************************************************************/

// Defino mis secciones
$sections = array(
	'inicio' => array(
		'alias' => 'Inicio',
		'url' => 'inicio/',
		'control' => 'inicio.php',
		'sub' => array(
			'portada' => array(
				'alias' => 'Portada',
				'url' => 'inicio/portada/',
				'control' => 'inicio.php'
			)
		)
	),
	'institucional' => array(
		'alias' => 'Institucional',
		'url' => 'institucional/',
		'control' => 'staff.php',
		'sub' => array(
			'staff' => array(
				'alias' => 'Staff',
				'url' => 'institucional/staff/',
				'control' => 'staff.php'
			)
		)
	),
	'catalogo' => array(
		'alias' => 'Cat&aacute;logo',
		'url' => 'catalogo/',
		'control' => 'catalogo.php',
		'sub' => array(
			'coleccion' => array(
				'alias' => 'Colecci&oacute;n',
				'url' => 'catalogo/coleccion/',
				'control' => 'catalogo.php',
				'plural' => 'colecciones'
			),
			'titulo' => array(
				'alias' => 'T&iacute;tulo',
				'url' => 'catalogo/titulo/a',
				'control' => 'catalogo.php',
			),
			'autor' => array(
				'alias' => 'Autor',
				'url' => 'catalogo/autor/',
				'control' => 'catalogo.php',
				'plural' => 'autores'
			),
			'genero' => array(
				'alias' => 'G&eacute;nero',
				'url' => 'catalogo/genero/',
				'control' => 'catalogo.php',
				'plural' => 'generos'
			)
		)		
	),
	'foreignrights' => array(
		'alias' => 'Foreign Rights',
		'url' => 'foreignrights/',
		'control' => 'foreignrights.php',
		'sub' => array(
			'foreignrights' => array(
				'alias' => 'Foreign Rights',
				'url' => 'foreignrights/detalle/',
				'control' => 'foreignrights.php'
			)
		)
	),
	'distribucion' => array(
		'alias' => 'Distribuci&oacute;n',
		'url' => 'distribucion/',
		'control' => 'distribucion.php',
		'sub' => array(
			'argentina' => array(
				'alias' => 'Argentina',
				'url' => 'distribucion/argentina/',
				'control' => 'distribucion.php'
			),
			'espana' => array(
				'alias' => 'Espa&ntilde;a',
				'url' => 'distribucion/espana/',
				'control' => 'distribucion.php'
			),
			'mexico' => array(
				'alias' => 'M&eacute;xico',
				'url' => 'distribucion/mexico/',
				'control' => 'distribucion.php'
			),
			'chile' => array(
				'alias' => 'Chile',
				'url' => 'distribucion/chile/',
				'control' => 'distribucion.php'
			),
			'uruguay' => array(
				'alias' => 'Uruguay',
				'url' => 'distribucion/uruguay/',
				'control' => 'distribucion.php'
			),
			'colombia' => array(
				'alias' => 'Colombia',
				'url' => 'distribucion/colombia/',
				'control' => 'distribucion.php'
			),
			'guatemala' => array(
				'alias' => 'Guatemala',
				'url' => 'distribucion/guatemala/',
				'control' => 'distribucion.php'
			),
			'peru' => array(
				'alias' => 'Peru',
				'url' => 'distribucion/peru/',
				'control' => 'distribucion.php'
			),
			'costarica' => array(
				'alias' => 'Costa Rica',
				'url' => 'distribucion/costarica/',
				'control' => 'distribucion.php'
			)
		)		
	),
	'noticias' => array(
		'alias' => 'Noticias',
		'url' => 'noticias/',
		'control' => 'noticias.php',
		'sub' => array(
			'2010' => array(
				'alias' => '2010',
				'url' => 'noticias/2010/',
				'control' => 'noticias.php'
			),
			'2011' => array(
				'alias' => '2011',
				'url' => 'noticias/2011/',
				'control' => 'noticias.php'
			)
		)
	)
);




/* SHORT URL
*************************************************************************************/

if ($_REQUEST['short']) {
	$path = 'includes/controller/' . $_REQUEST['short'] . '.php';
	$tab = addslashes($_REQUEST['tab']);
	$section = $_SESSION['section'];
	include($path);
	exit;
}



/* FULL URL
*************************************************************************************/

// Defino la tab
$tab = ($_REQUEST['tab']) ? addslashes($_REQUEST['tab']) : current(array_keys($sections));

// Defino la seccion
$section = ($_REQUEST['section']) ? addslashes($_REQUEST['section']) : current(array_keys($sections[$tab]['sub']));

// Chequeo que la seccion exista
if ($sections[$tab]['sub'][$section]) {
	// Controlador y titulo de la seccion
	$control = $sections[$tab]['sub'][$section]['control'];
	$alias = $sections[$tab]['sub'][$section]['alias'];
	// Full URL
	$path = 'includes/controller/' . $control;
	// Guardo la seccion
	$_SESSION['section'] = $section;
} else {
	// Pagina de error
	echo '404';
}

// Incluimos el controlador
include($path);

?>