
<div class="content prensa">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main noticias">
		
		
		<!-- Detalle de prensa -->
		<? if ($id): ?>
			<div class="detail">
				<!-- <p class="ctime"><?=htmlentities($prensa['emisor'])?> - <?=htmlentities($prensa['medio'])?></p> -->
				<h2><?=htmlentities($prensa['emisor'])?> - <?=htmlentities($prensa['medio'])?></h2>
				<? if ($prensa['video']): ?>
					<iframe width="420" height="315" src="<?=$prensa['embed']?>" frameborder="0" allowfullscreen></iframe>
				<? else: ?>
					<img class="new" src="/uploads/novedades/<?=$prensa['imagen']?>" />
				<? endif; ?>

				<div class="social">
					<a title="Compartir en Facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(CONFIG_SITE_URL . $_SERVER['REQUEST_URI'])?>"><img src="/img/facebook.png"/></a>
					<a title="Compartir en Twitter" target="_blank" href="http://twitter.com/home?status=<?=urlencode('Recomiendo el libro ' . $libro['titulo'] . ': ' . CONFIG_SITE_URL . $_SERVER['REQUEST_URI'])?>"><img src="/img/twitter.png"/></a>
					<img src="/img/email.png"/>
				</div>

				<hr>
				<div>
					<?=htmlentities($prensa['comentario'])?>
				</div>
			</div>
		
		<!-- Listado de prensa -->
		<? elseif ($prensas): ?>
			<ul class="news equal">
				<? foreach($prensas as $prensa): ?>
					<li>
						<a href="/prensa/institucional/<?=$prensa['id_prensa']?>">
							<img src="<?=$prensa['imagen']?>">
							<p class="ctime"><?=htmlentities($prensa['emisor'])?> - <?=htmlentities($prensa['medio'])?></p>
							<p class="title"><?=htmlentities(substr($prensa['comentario'], 0, 17))?>...</p>
						</a>
					</li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
		
	</div>

</div>
