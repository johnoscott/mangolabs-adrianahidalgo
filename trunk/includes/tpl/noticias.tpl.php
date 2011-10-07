
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main noticias">
		
		
		<!-- Detalle de noticia -->
		<? if ($id): ?>
			<div class="detail">
				<p class="ctime"><?=$noticia['fecha']?></p>
				<h2><?=$noticia['titulo']?></h2>
				<? if ($noticia['video']): ?>
					<iframe width="420" height="315" src="<?=$noticia['embed']?>" frameborder="0" allowfullscreen></iframe>
				<? else: ?>
					<img class="new" src="/uploads/novedades/<?=$noticia['imagen']?>" />
				<? endif; ?>
				<hr>
				<div>
					<?=$noticia['contenido']?>
				</div>
			</div>
		
		<!-- Listado de noticias -->
		<? elseif ($noticias): ?>
			<ul class="news equal">
				<? foreach($noticias as $noticia): ?>
					<li>
						<a href="/web/noticias/<?=$section?>/<?=$noticia['id_novedad']?>">
							<img src="/uploads/novedades/<?=$noticia['imagen']?>">
							<p class="ctime"><?=$noticia['fecha']?></p>
							<p class="title"><?=$noticia['titulo']?></p>
						</a>
					</li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
		
	</div>

</div>