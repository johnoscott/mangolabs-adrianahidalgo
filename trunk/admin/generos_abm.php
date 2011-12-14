<?  include('../includes/loader.inc.php'); 

	if (!$Usuario->logged()) {
		header("Location: /admin"); exit;
	}

	$config = array (
		'title' 	=> 'Generos',
		'modulo' 	=> 'generos',
		'key'		=> 'id_genero',
	);

	if ($_POST['data']) {
	
		foreach ($_POST['data'] as $tabla => $campos) {
			if ($_POST['data'][$tabla][$config['key']])
				$db->update($tabla, $campos);
			else
				$db->insert($tabla, $campos);
		}

		// Redirecciono
		header("Location: ".(($url = $Session->get($config['modulo'].'_listado'))? $url : '/admin/'.$config['modulo'].'/'));
		exit;
	}

	// Obtengo el registro a modificar
	$row = $db->get_row("SELECT * FROM generos WHERE id_genero = '".$_GET['id']."'");

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
								<p><label for="form-nombre">Nombre</label></p>
								<p><input type="text" id="form-nombre" name="data[<?=$config['modulo']?>][nombre]" value="<?=$row['nombre']?>"/></p>
							</li>
					
							<li>
								<p><label for="form-nombre">Orden</label></p>
								<p><input type="text" id="form-nombre" name="data[<?=$config['modulo']?>][orden]" value="<?=$row['orden']?>"/> (se ordena de mayor a menor)</p>
							</li>
					
							<!-- text -->
							<li>
								<p><label for="form-nombre">Descripcion</label></p>
								<p><input type="text" id="form-nombre" name="data[<?=$config['modulo']?>][descripcion]" value="<?=$row['descripcion']?>"/></p>
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

