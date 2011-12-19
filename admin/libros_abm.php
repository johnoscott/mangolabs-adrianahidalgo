<?  include('../includes/loader.inc.php'); 

	if (!$Usuario->logged()) {
		header("Location: /admin"); exit;
	}

	$config = array (
		'title' 	=> 'Libros',
		'modulo' 	=> 'libros',
		'key'		=> 'id_libro',
	);

	$path = 'uploads/libros/';

	if (!is_dir(preg_replace('/^(.+?)\/$/', '\\1', CONFIG_DOCUMENT_ROOT.$path)))
		mkdir(preg_replace('/^(.+?)\/$/', '\\1', CONFIG_DOCUMENT_ROOT.$path), 0777, true);

	if ($_POST['data']) {
	
		foreach ($_POST['data'] as $tabla => $campos) {
			if ($_POST['data'][$tabla][$config['key']])
				$db->update($tabla, $campos);
			else
				$db->insert($tabla, $campos);

			// Subo los archivos
			if ($_FILES)
				foreach ($_FILES as $file) {
					foreach ($file['tmp_name'] as $file_table => $data2)
						foreach ($data2 as $file_campo => $tmp_name) {
							if (!empty($tmp_name)) {
								// Subo el archivo fisico
								move_uploaded_file($tmp_name, CONFIG_DOCUMENT_ROOT.$path.$_POST['data'][$tabla][$config['key']].'.jpg');
								// Actualizo el campo en la base de datos
								$db->update($tabla, array_merge($campos, array($file_campo => $_POST['data'][$tabla][$config['key']].'.jpg')));
							}
						}
				}
		}

		// Redirecciono
		header("Location: ".(($url = $Session->get($config['modulo'].'_listado'))? $url : '/admin/'.$config['modulo'].'/'));
		exit;
	}

	// Obtengo el registro a modificar
	$row = $db->get_row("SELECT * FROM libros WHERE id_libro = '".$_GET['id']."'");

	// Obtengo las colecciones
	if ($listado = $db->get_results("SELECT * FROM colecciones ORDER BY nombre"))
		foreach ($listado as $registro)
			$colecciones[$registro['id_coleccion']] = $registro['nombre'];

	// Obtengo los generos
	if ($listado = $db->get_results("SELECT * FROM generos ORDER BY nombre"))
		foreach ($listado as $registro)
			$generos[$registro['id_genero']] = $registro['nombre'];

	// Obtengo los autores
	if ($listado = $db->get_results("SELECT * FROM autores ORDER BY nombre"))
		foreach ($listado as $registro)
			$autores[$registro['id_autor']] = $registro['nombre'];

?>
<!DOCTYPE html>

<html>

<head>
	
	<meta charset="utf-8" />
	
	<title><?=$config['title']?></title>
	
	<!-- JQUERY -->
	<script src="/js/jquery-1.4.4.min.js"></script>	
		
	<!-- JQUERY UI -->
	<script src="/js/jquery-ui-1.8.7.custom.min.js"></script>
	<link type="text/css" href="/css/smoothness/jquery-ui-1.8.7.custom.css" rel="stylesheet" />

	<!-- CSS -->
	<link rel="stylesheet" href="/css/reset.css" type="text/css" />
	<link rel="stylesheet" href="/css/admin.css" type="text/css" />	
	<link rel="stylesheet" href="/css/customizr.css" type="text/css" />
	<link rel="stylesheet" href="/css/960.css" type="text/css" />
	
	<!-- Fonts -->
	<link rel="stylesheet" href="/css/fonts/fonts.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	

	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<link rel="stylesheet" href="/css/ie.css" type="text/css" />
	<![endif]-->
	
</head>

<body class="app-classic">

	<!--<div class="login-back"></div>

	<div class="titlebar"></div>
	
	<div class="window">
	
		<div class="content">-->

			<?  include('modules/header.inc.php'); ?>

			<div class="space clear"></div>

			<div class="container" data-object="">
			
				<h2><?=($config['title'])?></h2>
				
				<div class="space clear"></div>
			
				<!-- Content -->

				<form method="post" enctype="multipart/form-data" action="<?=$PHP_SELF?>" class="edit">
					<!-- hidden -->
					<input type="hidden" name="data[<?=$config['modulo']?>][<?=$config['key']?>]" value="<?=$_GET['id']?>">
					
					<div class="legend"><h3><?=$config['title']?></h3></div>
						
					<?#	foreach ($data['update'] as $id => $update): ?>
					
						<?=($id > 0)? '<div class="itemid">'.$id.'</div>' : ''?>
						
						<ul class="list">
					
							<!-- text -->
							<li>
								<p><label for="form-titulo">Titulo</label></p>
								<p><input type="text" id="form-titulo" name="data[<?=$config['modulo']?>][titulo]" value="<?=$row['titulo']?>"/></p>
							</li>

							<!-- text -->
							<li>
								<p><label for="form-subtitulo">Subtitulo</label></p>
								<p><input type="text" id="form-subtitulo" name="data[<?=$config['modulo']?>][subtitulo]" value="<?=$row['subtitulo']?>"/></p>
							</li>

							<!-- select -->
							<li>
								<p><label for="form-home">Novedades</label></p>
								<p>
									<select id="form-home" name="data[<?=$config['modulo']?>][home]">
										<option value="0" <?=($row['home'] == 0)? 'selected="selected"' : '' ?> >no</option>
										<option value="1" <?=($row['home'] == 1)? 'selected="selected"' : '' ?> >si</option>
									</select>
								</p>
							</li>

							<!-- select -->
							<li>
								<p><label for="form-reedicion">Reedicion</label></p>
								<p>
									<select id="form-reedicion" name="data[<?=$config['modulo']?>][reedicion]">
										<option value="0" <?=($row['reedicion'] == 0)? 'selected="selected"' : '' ?> >no</option>
										<option value="1" <?=($row['reedicion'] == 1)? 'selected="selected"' : '' ?> >si</option>
									</select>
								</p>
							</li>

							<!-- text -->
							<li>
								<p><label for="form-precio">Precio</label></p>
								<p><input type="text" id="form-precio" name="data[<?=$config['modulo']?>][precio]" value="<?=$row['precio']?>"/></p>
							</li>

							<!-- text -->
							<li>
								<p><label for="form-isbn">ISBN</label></p>
								<p><input type="text" id="form-isbn" name="data[<?=$config['modulo']?>][isbn]" value="<?=$row['isbn']?>"/></p>
							</li>

							<!-- text -->
							<li>
								<p><label for="form-isbn">ISBN ESPA&Ntilde;A</label></p>
								<p><input type="text" id="form-isbn" name="data[<?=$config['modulo']?>][isbn_es]" value="<?=$row['isbn_es']?>"/></p>
							</li>

							<!-- file -->
							<li>
								<p><label for="form-imagen">Imagen</label></p>
								<p>
									<input type="file" id="form-imagen" name="data[<?=$config['modulo']?>][imagen]" value=""/>
									<?=($row['imagen'])? '<a href="'.CONFIG_SITE_URL.$path.$row['imagen'].'" target="_blank">[Ver imagen actual]</a> <!--<a href="">[borrar imagen actual]</a>-->' : ''?>
								</p>
							</li>

							<!-- select -->
							<li>
								<p ><label for="form-autor">Autor</label></p>
								<p>
									<select id="form-autor" name="data[<?=$config['modulo']?>][id_autor]">
										<option value="0">------</option>
										<? foreach($autores as $key => $val): ?>
											<option value="<?=$key?>" <?=($key == $row['id_autor'])? 'selected="selected"' : '' ?> ><?=ucfirst($val)?></option>
										<? endforeach; ?>
									</select>
								</p>
							</li>

							<!-- select -->
							<li>
								<p ><label for="form-genero">Genero</label></p>
								<p>
									<select id="form-genero" name="data[<?=$config['modulo']?>][id_genero]">
										<option value="0">------</option>
										<? foreach($generos as $key => $val): ?>
											<option value="<?=$key?>" <?=($key == $row['id_genero'])? 'selected="selected"' : '' ?> ><?=ucfirst($val)?></option>
										<? endforeach; ?>
									</select>
								</p>
							</li>

							<!-- select -->
							<li>
								<p ><label for="form-coleccion">Coleccion</label></p>
								<p>
									<select id="form-coleccion" name="data[<?=$config['modulo']?>][id_coleccion]">
										<option value="0">------</option>
										<? foreach($colecciones as $key => $val): ?>
											<option value="<?=$key?>" <?=($key == $row['id_coleccion'])? 'selected="selected"' : '' ?> ><?=ucfirst($val)?></option>
										<? endforeach; ?>
									</select>
								</p>
							</li>

							<!-- textarea -->
							<li>
								<p><label>Descripcion</label></p>
								<p><textarea name="data[<?=$config['modulo']?>][descripcion]"><?=$row['descripcion']?></textarea></p>
							</li>

						</ul>
					
					<?#	endforeach; ?>
						
					<div class="submits">
					
						<button type="submit" name="action" value="Guardar" class="capitalize button">Guardar</button>
						
					</div>

				</form>


				<!-- /Content -->

				
			</div>

			<footer></footer>
		
		<!--</div>
		
	</div>-->
			
<script>

$(function() {

	obj = $('[data-object]').attr('data-object');

	$('input:visible, select:visible').first().focus();
	
	$('.buttonset').buttonset();
	
	$('input[type="radio"]', '#visual-type').bind('click', function() {
		$('body').removeClass();
		$('body').addClass($(this).attr('id'));
		setCookie('app-style', $(this).attr('id'), 100);
	});
	
	
	$('[data-textsize]').live('click', function(e) {
		e.preventDefault();
		var size = parseInt($('body').css('fontSize'));
		if ($(this).attr('data-textsize') === 'plus')
			size += 1;
		else
			size -= 1;
		$('body').css('fontSize', size);
	});

	editor('[data-role=editor]');
	
        $( ".hasDatePicker" ).datepicker({'dateFormat': 'yy-mm-dd'});

/* Common
------------------------------------------------------------------------------------------ */
	
	// Seleccionar todos los checkbox
	$('[data-action="selectall"]').click(function() {
		checkboxes = $(this).parents('ul').find('input[type="checkbox"]');
		if ($(this).attr('checked'))
			checkboxes.attr('checked', 'checked');
		else
			checkboxes.removeAttr('checked');
	});
	
	$(window).jkey('shift+n', function() {
		window.location.href = '/admin/' + obj + '/add';
	});
	

});


function setCookie(name,value,expiredays) {
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toUTCString()+'; path=/');
}

function editor(obj) {
	$(obj).fck({
		path: '/js/fckeditor/',
		toolbar:'SIC',
		height: 500
	});
};



</script>

</body>	
	
</html>

