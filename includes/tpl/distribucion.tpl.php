
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main distribucion">
	
		<ul>
<!--
			<li class="selected"><?=$distribuidor['nombre']?></li>
			<li><?=$distribuidor['domicilio']?></li>
			<li><?=$distribuidor['ciudad']?> - <?=$distribuidor['pais']?></li>
			<li>Tel&eacute;fono: <?=$distribuidor['telefono']?></li>
			<li>Fax: <?=$distribuidor['fax']?></li>
			<li>Email: <a href="mailto:<?=$distribuidor['mail']?>"><?=$distribuidor['mail']?></a></li>
-->
			<?	for  ($class = "selected"; $dist = current($distribuidor); next($distribuidor), $class=""): ?>
			<li class="<?=$class?>"><?=iconv('iso-8859-1', 'utf-8', $dist)?></li>
			<?	endfor; ?>

		</ul>
		
	</div>

	<div class="init" style="border: 0 none; float: left; padding-top: 0;">
		<ul class="books equal" style="border: 0;">
			<li>
				<div class="ribbon" style="margin-top: -27px"><img src="/img/ribbon-noticias.png"></div>
				<ul class="news">
					<? foreach($noticias as $noticia): ?>
						<li>
							<a href="/web/noticias/<?=$year?>/<?=$noticia['id_novedad']?>">
								<img src="/uploads/novedades/<?=$noticia['imagen']?>">
								<p class="ctime"><?=$noticia['fecha']?></p>
								<p class="title"><?=$noticia['titulo']?></p>
							</a>
						</li>
					<? endforeach; ?>
				</ul>
			</li>
		</ul>
	</div>

</div>
