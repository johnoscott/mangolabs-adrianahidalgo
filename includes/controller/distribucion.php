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

if (!$distribuidores[$_GET['section']])
	$_GET['section'] = 'argentina';

$distribuidores = array (
	'argentina' => array (
		'Tusquets editores', 
		'Venezuela 1664', 
		'Ciudad de Buenos Aires - Argentina', 
		'Teléfono: (005411) 4381-4520', 
		'Fax: (005411) 4381-1760', 
		'e-mail: <a href="mailto: ventas@tusquets.com.ar">ventas@tusquets.com.ar</a>', 
	),
	'espana' => array (
		'UDL - Unidad para la Distribución de Libros S.L.', 
		'Nacional II Salida 23, Ctra. M-300 Km. 26,5', 
		'Nave Logística 2', 
		'28802 Alcalá de Henares', 
		'Madrid - España', 
		'Teléfono: (0034) 91.882.32.80', 
		'Fax: (0034) 91.880.06.58', 
		'e-mail: <a href="mailto: info@udllibros.com">info@udllibros.com</a>', 
	),
	'mexico' => array (
		'Distripal S.A. de C.V.', 
		'Norte 198 No. 670,', 
		'Col. Pensador Mexicano,', 
		'C.P. 15510', 
		'Deleg. Venustiano Carranza', 
		'México, D.F. ', 
		'Teléfono: 00-52-55-1560-0784', 
		'e-mail: <a href="mailto: proculmex@prodigy.net.mx">proculmex@prodigy.net.mx</a>', 
	),
	'chile' => array (
		'Editorial Catalonia ', 
		'Santa Isabel 1235,', 
		'Providencia, Santiago de Chile', 
		'Teléfono: (00562) 223-6386 / 269-6420', 
		'Fax: (00562) 225-5948', 
		'e-mail: <a href="mailto: prensacatalonia@gmail.com">prensacatalonia@gmail.com</a>', 
	),
	'uruguay' => array (
		'Gussi Libros', 
		'Yaro 1119 – Montevideo ', 
		'República Oriental del Uruguay', 
		'Teléfono: (5982) 4136195 ', 
		'Fax: (5982) 4133042', 
		'e-mail: <a href="mailto: pedidos@gussilibros.com">pedidos@gussilibros.com</a>', 
	),
	'colombia' => array (
		'Fondo de Cultura Económica Colombia', 
		'Calle 11 No. 5-60', 
		'Barrio La Candelariav',
		'Bogotá - Colombia', 
		'Teléfono: (571) 2832200 ', 
		'Fax: (571) 2832200 ', 
		'e-mail: <a href="mailto: alopez@fce.com.co">alopez@fce.com.co</a>', 
	),
	'guatemala' => array (
		'Fondo de Cultura Económica de Guatemala', 
		'6ª. Avenida 8-65, Zona 9', 
		'Guatemala - Centroamérica', 
		'Teléfono: (502) 2334-1635 Ext. 113', 
		'Fax: (502) 2332 4216', 
		'e-mail: <a href="mailto: gerencia@fceguatemala.com">gerencia@fceguatemala.com</a>', 
	),
	'peru' => array (
		'La Familia Distribuidora de libros S.A.', 
		'Av. República de Chile 661 - Jesús María', 
		'110345 - Lima - Perú', 
		'Teléfono: (00.51.1) 431.0417', 
		'Fax: (00.51.1) 433.5717', 
		'e-mail: <a href="mailto: famida@terra.com.pe">famida@terra.com.pe</a>', 
	),
	'costarica' => array (
		'Desarrollos Culturales Costarricenses', 
		'Boulevard Rohrmoser', 
		'100 metros Oeste y 25 metros Sur', 
		'Apartado Postal 11397-1000 San José', 
		'Costa Rica', 
		'Teléfono: +506-22-203015', 
		'Fax: +506-22-903174', 
		'e-mail: <a href="mailto: info@libreriainternacional.com">info@libreriainternacional.com</a>', 
	),
	'ecuador' => array (
		'LIBRERÍA PAPIROS', 
		'Av. 6 de diciembre N30-59', 
		'Quito - Ecuador', 
		'Telf. (02) 2223491 / (02) 3238918 / (02) 3238205', 
		'e-mail: <a href="mailto: randini@libreriapapiros.ec">randini@libreriapapiros.ec</a>', 
		'<a href="http://www.libreriapapiros.com" target="_blank">www.libreriapapiros.com</a>', 
	),
	'venezuela' => array (
		'LIBRERÍA KALATHOS', 
		'Centro de arte Los Galpones – 8va. Transversal de Los Chorros', 
		'Caracas-Venezuela', 
		'Tel: 6605658. /2852820.', 
		'E-mail: <a href="mailto: libreriakalathos@gmail.com">libreriakalathos@gmail.com</a>', 
	),
	'bolivia' => array (
		'LITEXSA BOLIVIANA', 
		'Av. Prol. Montenegro 778, 1er piso', 
		'La Paz-Bolivia', 
		'Tel: (591-2) 2772631/ 2795034', 
		'E-mail: <a href="mailto: info@libreriaslectura.com">info@libreriaslectura.com</a>', 
	),
);

$distribuidor = $distribuidores[$section];

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
include('includes/tpl/distribucion.tpl.php');
include('includes/tpl/footer.tpl.php');

?>
