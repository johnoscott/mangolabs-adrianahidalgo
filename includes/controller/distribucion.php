<?

/* Obtengo los datos
*************************************************************/

$distribuidor = array(
	'nombre' => $sections[$tab]['sub'][$section]['alias'] . ' Editores',
	'domicilio' => 'Calle ' . rand(0,3000),
	'ciudad' => 'CABA',
	'pais' => $sections[$tab]['sub'][$section]['alias'],
	'telefono' => '(' . rand(0,9999) . ') . ' . rand(0,5000) . '-' . rand(0,5000),
	'fax' => '(' . rand(0,9999) . ') . ' . rand(0,5000) . '-' . rand(0,5000),
	'mail' => 'ventas@tusquets.com.ar',
);

/* Incluyo la interfaz
*************************************************************/
include('includes/tpl/header.tpl.php');
include('includes/tpl/distribucion.tpl.php');
include('includes/tpl/footer.tpl.php');

?>