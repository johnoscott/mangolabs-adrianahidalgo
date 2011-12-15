
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main noticias">
		
		
		<!-- Detalle de noticia -->
		<? if ($id): ?>
			<div class="detail">
				<p class="ctime"><?=$noticia['fecha']?></p>
				<h2><?=htmlentities($noticia['titulo'])?></h2>
				<? if ($noticia['video']): ?>
					<iframe width="420" height="315" src="<?=$noticia['embed']?>" frameborder="0" allowfullscreen></iframe>
				<? else: ?>
					<img class="new" src="/uploads/novedades/<?=$noticia['imagen']?>" />
				<? endif; ?>

				<div class="social">
					<a title="Compartir en Facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(CONFIG_SITE_URL . $_SERVER['REQUEST_URI'])?>"><img src="/img/facebook.png"/></a>
					<a title="Compartir en Twitter" target="_blank" href="http://twitter.com/home?status=<?=urlencode('Recomiendo el libro ' . $libro['titulo'] . ': ' . CONFIG_SITE_URL . $_SERVER['REQUEST_URI'])?>"><img src="/img/twitter.png"/></a>
					<img src="/img/email.png"/>
				</div>

				<hr>
				<div>
					<?=htmlentities($noticia['contenido'])?>
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
							<p class="title"><?=htmlentities($noticia['titulo'])?></p>
						</a>
					</li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
		
	</div>

</div>
