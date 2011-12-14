<div class="content">

	<div class="sidebar">
		<ul class="list">
			<li class="selected">CONTACTO</li>
		</ul>
		<div class="pastilla"><a href="catalogo.pdf">Ver cat&aacute;logo (PDF)</a></div>
	</div>
	
	<div class="main distribucion" style="display: block; float: left; margin-left: 0; width: 500px;">

		<ul>
			<li>Francisco de Vittoria 2324, Planta Baja</li>
			<li>Tel: (005411) 4800-1900</li>
			<li>Ciudad De Buenos Aires, Argentina</li>
			<li><a href="mailto:info@adrianahidalgo.com">info@adrianahidalgo.com</a></li>
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
