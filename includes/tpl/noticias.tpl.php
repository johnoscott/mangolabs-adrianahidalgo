
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main noticias">
		
		
		<!-- Detalle de noticia -->
		<? if ($id): ?>
			<div class="detail">
				<p class="ctime"><?=$noticia['ctime']?></p>
				<h2><?=$noticia['titulo']?></h2>
				<img src="/img/video.jpg" />
				<hr>
				<div>
					<?=$noticia['texto']?>
				</div>
			</div>
		<? endif; ?>
		
		
		
		
		<!-- Listado de noticias -->
		<? if ($noticias): ?>
			<ul class="news equal">
				<? foreach($noticias as $noticia): ?>
					<li>
						<a href="/web/noticias/<?=$section?>/<?=$noticia['id_noticia']?>">
							<img src="/img/noticias/<?=$noticia['imagen']?>">
							<p class="ctime"><?=$noticia['ctime']?></p>
							<p class="title"><?=$noticia['titulo']?></p>
						</a>
					</li>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
		
	</div>

</div>