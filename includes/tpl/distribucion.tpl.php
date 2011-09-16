
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main distribucion">
	
		<ul>
			<li class="selected"><?=$distribuidor['nombre']?></li>
			<li><?=$distribuidor['domicilio']?></li>
			<li><?=$distribuidor['ciudad']?> - <?=$distribuidor['pais']?></li>
			<li>Tel&eacute;fono: <?=$distribuidor['telefono']?></li>
			<li>Fax: <?=$distribuidor['fax']?></li>
			<li>Email: <a href="mailto:<?=$distribuidor['mail']?>"><?=$distribuidor['mail']?></a></li>
		</ul>
		
	</div>

</div>
