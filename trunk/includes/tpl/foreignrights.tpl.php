
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main foreignrights">

		<p>Texto correspondiente</p>
		
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
