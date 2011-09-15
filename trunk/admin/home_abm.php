<?  include('../includes/loader.inc.php'); 

	$config = array (
	);

	if ($_POST['data']) {
	
		foreach ($_POST['data'] as $tabla => $campos) {
			if ($_POST['data']['tabla']['id'])
				$db->update($tabla, $campos);
			else
				$db->insert($tabla, $campos);
		}
		
	}

	// Obtengo el producto a modificar
	$row = $db->get_row("SELECT * FROM productos");

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

				<form method="post" enctype="multipart/form-data" action="<?=$PHP_SELF?>" class="edit">
					<!-- hidden -->
					<input type="hidden" name="data[productos][id_producto]?>" value="<?=$data['field']['fieldvalue']?>">
					
					<div class="legend"><h3><?=$config['title']?></h3></div>
						
					<?#	foreach ($data['update'] as $id => $update): ?>
					
						<?=($id > 0)? '<div class="itemid">'.$id.'</div>' : ''?>
						
						<ul class="list">
					
							<!-- file -->
							<li>
								<p><label for="form-<?=$data['field']['Name']?>"><?=$data['field']['Name']?></label></p>
								<p>
									<input type="file" id="form-<?=$data['field']['Name']?>" name="<?=$data['field']['fieldname']?>[]" value=""/>
									<?=($data['field']['fieldvalue'])? '<a href="'.$data['field']['fieldvalue'].'" target="_blank">[Ver imagen actual]</a> <!--<a href="">[borrar imagen actual]</a>-->' : ''?>
								</p>
							</li>

							<!-- select -->
							<li>
								<p ><label for="form-<?=$data['field']['Name']?>"><?=$data['field']['Name']?></label></p>
								<p>
									<select id="form-<?=$data['field']['Name']?>" name="<?=$data['field']['fieldname']?>">
										<? foreach($data['field']['Values'] as $key => $val): ?>
											<option value="<?=$key?>" <?=($key == $data['field']['fieldvalue'])? 'selected="selected"' : '' ?> ><?=ucfirst($val)?></option>
										<? endforeach; ?>
									</select>
								</p>
							</li>

							<!-- text -->
							<li>
								<p><label for="form-<?=$data['field']['Name']?>"><?=$data['field']['Name']?></label></p>
								<p><input type="text" id="form-<?=$data['field']['Name']?>" name="<?=$data['field']['fieldname']?>" value="<?=$data['field']['fieldvalue']?>"/></p>
							</li>
											
							<!-- checkbox -->
							<li>
								<p><?=$data['field']['Name']?></p>
								<p>
									<? foreach($data['field']['Values'] as $key => $val): ?>
										<input id="form-<?=$data['field']['fieldname']?>-<?=$key?>" type="checkbox" name="<?=$data['field']['fieldname']?>[]" value="<?=$key?>" <?=(in_array($key, array_values($data['field']['fieldvalue'])))? 'checked="checked"' : '' ?>/> 
										<label for="form-<?=$data['field']['fieldname']?>-<?=$key?>"><?=ucfirst($val)?></label>
									<? endforeach; ?>
								</p>
							</li>
											
							<!-- disabled -->
							<li>
								<p><?=$data['field']['Name']?></p>
								<p><?=$data['field']['fieldvalue']?></p>
							</li>
											
							<!-- textarea -->
							<li>
								<p><label><?=$data['field']['Name']?></label></p>
								<p><textarea name="<?=$data['field']['fieldname']?>"><?=$data['field']['fieldvalue']?></textarea></p>
							</li>
											
							<!-- boolean -->
							<li>
								<p><?=$data['field']['Name']?></p>
								<p>
										<input type="hidden" name="<?=$data['field']['fieldname']?>" value="0">
										<input id="form-<?=$data['field']['fieldname']?>" type="checkbox" name="<?=$data['field']['fieldname']?>" value="1" <?=($data['field']['fieldvalue'] == 1) ? 'checked="checked"' : '' ?>/> 
										<label for="form-<?=$data['field']['fieldname']?>"><?=ucfirst($val)?></label>
								</p>
							</li>
											
							<!-- date -->
							<li>
								<p><label for="form-<?=$data['field']['Name']?>"><?=$data['field']['Name']?></label></p>
								<p><input type="text" class="short hasDatePicker" id="form-<?=$data['field']['Name']?>" name="<?=$data['field']['fieldname']?>" value="<?=$data['field']['fieldvalue']?>"/></p>
							</li>
											
							<!-- radio -->
							<li>
								<p><?=$data['field']['Name']?></p>
								<p>
									<? foreach($data['field']['Values'] as $key => $val): ?>
										<input id="form-<?=$data['field']['fieldname']?>-<?=$key?>" type="radio" name="<?=$data['field']['fieldname']?>" value="<?=$key?>" <?=($key == $data['field']['fieldvalue'])? 'checked="checked"' : '' ?>/> 
										<label for="form-<?=$data['field']['fieldname']?>-<?=$key?>"><?=ucfirst($val)?></label>
									<? endforeach; ?>
								</p>
							</li>
											
							<!-- textarea -->
							<li>
								<p><label><?=$data['field']['Name']?></label></p>
								<p><textarea style="height: 500px;" data-role="editor" name="<?=$data['field']['fieldname']?>"><?=$data['field']['fieldvalue']?></textarea></p>
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

