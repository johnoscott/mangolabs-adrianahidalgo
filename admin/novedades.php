<?  include('../includes/loader.inc.php'); 

	if (!$Usuario->logged()) {
		header("Location: /admin"); exit;
	}

	$config = array (
		'title' 	=> 'Novedades',
		'modulo' 	=> 'novedades',
	);

	// Almaceno la url del listado de este modulo para redireccionar despues del abm
	$Session->set($config['modulo'].'_listado', $_SERVER['REQUEST_URI']);

	$data['titles'] = array('Codigo', 'Titulo');

	// Borro el registro
	if ($_GET['delete'])
		$db->query("DELETE FROM novedades WHERE id_novedad = '".addslashes($_GET['delete'])."'");

	// Obtengo el listado
	if ($listado = $db->get_results("SELECT id_novedad, titulo FROM novedades WHERE 1=1 ORDER BY titulo"))
		foreach ($listado as $l)
			$data['listado'][$l['id_novedad']] = $l;


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

<body class="app-dark">

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

				<form method="post" action="<?=$PHP_SELF?>" class="browse">

					<!-- Actions -->
					
					<div class="right">
					</div>
					
					<!-- Visualization -->
					
					<div class="left">
						<a class="button" href="/admin/<?=$config['modulo']?>/agregar/"><strong>&#10010;</strong> Agregar</a>
					</div>
					
					<div class="space clear"></div>

					<!-- Table of items -->	

					<? if ($data['listado']): ?>
					
						<div class="legend"><h3>Listado</h3></div>				
						
						<ul id="item-list" class="list">
								
							<li class="th">
							
								<!-- Select All -->
								<p>
									<input data-action="selectall" type="checkbox">
								</p>
							
								<!-- Name of columns -->
								<? foreach ($data['titles'] as $k): ?>
									
									<? if ($k != $data['key']): ?>
									
										<p><?=$k?></p>
									
									<? endif; ?>
									
								<? endforeach; ?>
							
								<!-- Search -->
								<p style="width: 150px;">Acciones</p>
							
							</li>
							
							<!-- Rows -->
							
							<? foreach($data['listado'] as $key_item => $value_item):  ?>

								<li class="td">
								
									<!-- Checkboxes -->
									<p>							
										<input type="checkbox" name="data[id][<?=$key_item?>]" value="<?=$key_item?>">
									</p>
								
								
									<!-- Data -->
									<? foreach ($value_item as $k => $v): ?>
										
										<? if ($k != $data['key']): ?>
										
											<p><?=($v)?></p>
										
										<? endif; ?>
									
									<? endforeach;?>
								
									<!-- Direct Actions -->
									<p>
										<span class="invisible actions">
												<a href="/admin/<?=$config['modulo']?>/modificar/<?=$key_item?>"><span class="icon ui-icon-wrench"></span>Modificar</a>
												<a onClick="return confirm('Estas seguro que queres borrar el registro?');" href="/admin/<?=$config['modulo']?>/?delete=<?=$key_item?>"><span class="icon ui-icon-trash"></span>Borrar</a>
										</span>
									</p>
								
								</li>

							<? endforeach; ?>
						
						</ul>
						
						<div class="submits">
				<!--
							<div class="buttonset">
								<button name="data[action]" value="update">Update</button>
								<button name="data[action]" value="delete">Remove</button>
							</div>
				-->
							<div class="paginator">
								<?	if ($data['pagina'] > 1): ?>
									<span><a href="<?='/admin'.$controller.'/browse/limit:'.($data['pagina']-1)?>">Anterior</a></span>
								<?	endif; ?>
								<?	for ($i = 1; $i <= (int)$data['paginas']; $i++): ?>
									<span><a href="<?='/admin'.'/'.$controller.'/browse/limit:'.$i?>" <?=($i == $data['pagina'])? 'class="current"' : ''?>><?=$i?></a></span>
								<?	endfor; ?>
								<?	if ($data['pagina'] < $data['paginas']): ?>
									<span><a href="<?='/admin/'.$controller.'/browse/limit:'.($data['pagina']+1)?>">Siguiente</a></span>
								<?	endif; ?>
							</div>
						</div>
						
					<? else: ?>

						No hay registros para mostrar.

					<? endif; ?>

				</form>

				<!-- / Table of items -->

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
