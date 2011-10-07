
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main detail">
	
	
		<!-- Cabecera -->
		<? if ($cabeceras): ?>
			<h2 class="selected"><?=$cabeceras['nombre']?></h2>
			<h5><?=$cabeceras['descripcion']?></h5><hr>
		<? endif; ?>
		
		
		
		
		
		<!-- Tapa del libro -->
		<div class="sidebar">
			<img class="cover" src="/uploads/libros/<?=$libro['imagen']?>"/>
			<div class="social">
				<img src="/img/facebook.png"/>
				<img src="/img/twitter.png"/>
				<img src="/img/email.png"/>
			</div>
		</div>
			
		<div class="description">
			
			<!-- Tab menu -->
			<ul class="menu" data-role="tabs">
				<strong>
					<li><a data-content="ficha" class="selected">Ficha</a></li>
					<li><a data-content="autor">Autor</a></li>
					<li><a data-content="descarga">Descarga</a></li>
					<li><a data-content="prensa">Prensa</a></li>
				</strong>
			</ul>
			
			
			<!-- Tab 1: Ficha -->
			<div id="ficha" class="tab">
				<div class="uppercase">
					<h5 class="author"><?=$libro['autor']?></h5>
					<h2 class="avenir85"><?=$libro['titulo']?></h2>
					<div>
						<p class="price">$ <?=$libro['precio']?> .-</p>
						<div class="buttonbar"><button class="button">A&ntilde;adir a la bolsa de compras</button></div>
						<p><?=$libro['subtitulo']?></p>
						<ul>
							<li>Colecci&oacute;n: <?=$coleccion['nombre']?></li>
							<li>G&eacute;nero: <?=$libro['genero']?></li>
							<li>ISBN: <?=$libro['isbn']?></li>
						</ul>
					</div>
				</div>
				<hr>
				<div>
					<?=$libro['descripcion']?>
				</div>
			</div>
			
			
			
			<!-- Tab 2: Autor -->
			<div id="autor" class="tab hide">
				<h2 class="selected"><?=$autor['nombre']?></h2>
				<?=$autor['biografia']?>
			</div>
			
			
			
			<!-- Tab 3: Descarga -->
			<div id="descarga" class="tab hide">
				Descarga
			</div>
			
			
			
			<!-- Tab 4: Prensa -->
			<div id="prensa" class="tab hide">
				<? foreach($libro['prensa'] as $opinion):?>
				<div class="quote avenir55">
					<p class="citation">&#8220;<?=$opinion['comentario']?>&#8221;</p>
					<p class="talker"><?=$opinion['emisor']?><br><em>- <?=$opinion['medio']?> -</em></p>
				</div>
				<? endforeach; ?>
			</div>
			
			
			
		</div>
		
	</div>

</div>

