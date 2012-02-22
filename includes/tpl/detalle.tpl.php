
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main detail">
	
	
		<!-- Cabecera -->
		<? if ($cabeceras): ?>
			<h2 class="selected"><?=htmlentities($cabeceras['nombre'])?></h2>
			<h5><?=htmlentities($cabeceras['descripcion'])?></h5><hr>
		<? endif; ?>
		
		
		
		
		
		<!-- Tapa del libro -->
		<div class="sidebar">
			<img class="cover" src="/uploads/libros/<?=$libro['imagen']?>"/>
			<div class="social">
				<a title="Compartir en Facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(CONFIG_SITE_URL . $_SERVER['REQUEST_URI'])?>"><img src="/img/facebook.png"/></a>
				<a title="Compartir en Twitter" target="_blank" href="http://twitter.com/home?status=<?=urlencode('Recomiendo el libro ' . $libro['titulo'] . ': ' . CONFIG_SITE_URL . $_SERVER['REQUEST_URI'])?>"><img src="/img/twitter.png"/></a>
				<img src="/img/email.png"/>
			</div>
		</div>
			
		<div class="description">
			
			<!-- Tab menu -->
			<ul class="menu" data-role="tabs">
				<strong>
					<li><a data-content="ficha" class="selected"><span>Ficha</span></a></li>
					<li><a data-content="autor"><span>Autor</span><span class="piquito"></span></a></li>
					<li><a data-content="descarga"><span>Descarga</span><span class="piquito"></span></a></li>
					<li><a data-content="prensa"><span>Prensa</span><span class="piquito"></span></a></li>
				</strong>
			</ul>
			
			
			<!-- Tab 1: Ficha -->
			<div id="ficha" class="tab">
				<div class="uppercase">
					<h5 class="author"><?=htmlentities($libro['autor'])?></h5>
					<h2 class="avenir85"><?=htmlentities($libro['titulo'])?></h2>
					<div>
						<!-- <p class="price">$ <?=$libro['precio']?> .-</p> -->
						<!-- <div class="buttonbar"><button class="button">A&ntilde;adir a la bolsa de compras</button></div> -->
						<p><?=htmlentities($libro['subtitulo'])?></p>
						<ul>
							<li>Colecci&oacute;n: <?=htmlentities($libro['coleccion'])?></li>
							<li>G&eacute;nero: <?=htmlentities($libro['genero'])?></li>
							<li>ISBN: <?=(($Session->get('country') == 'es') && ($libro['isbn_es']))? $libro['isbn_es'] : $libro['isbn']?></li>
							<li>P&aacute;ginas: <?=$libro['paginas']?></li>
						</ul>
					</div>
				</div>
				<hr>
				<div>
					<?=htmlentities($libro['descripcion'])?>
				</div>
			</div>
			
			
			
			<!-- Tab 2: Autor -->
			<div id="autor" class="tab hide">
				<h2 class="margin selected"><?=htmlentities($libro['autor'])?></h2>
				<?=$libro['biografia']?>
			</div>
			
			
			
			<!-- Tab 3: Descarga -->
			<div id="descarga" class="tab hide">
				<?=($libro['descarga'])? '<a href="/uploads/libros/'.$libro['descarga'].'">Descargar</a>' : 'No hay descargas'?>
			</div>
			
			
			
			<!-- Tab 4: Prensa -->
			<div id="prensa" class="tab hide">
				<? foreach($libro['prensa'] as $opinion):
						$limite = 150;
						// Limito el comentario
						$comentario = htmlentities(substr($opinion['comentario'], 0, $limite)).'<span id="opinion-'.$opinion['id_prensa'].'" style="display: none;">'.htmlentities(substr($opinion['comentario'], $limite)).'</span>';
						$leermas =  '<a href="#" id_opinion="'.$opinion['id_prensa'].'" style="color: #D2232A; font-size: 10px;" class="opinion-leer-mas" id="opinion-leer-mas-'.$opinion['id_prensa'].'"> ..VER M&AACUTE;S</a>';
						$leermas .=  '<a href="#" id_opinion="'.$opinion['id_prensa'].'" style="color: #D2232A; font-size: 10px; display: none;" class="opinion-leer-menos" id="opinion-leer-menos-'.$opinion['id_prensa'].'"> ..OCULTAR</a>';
				?>
				<div class="margin quote avenir55">
					<p class="citation">
					<?	if ($opinion['pdf'] && is_file(CONFIG_DOCUMENT_ROOT.'uploads/prensa/'.$opinion['pdf'])): ?>
						<a target="_blank" href="<?=CONFIG_SITE_URL.'uploads/prensa/'.$opinion['pdf']?>">&#8220;<?=$comentario?></a><?=$leermas?>
					<? elseif ($opinion['imagen'] && is_file(CONFIG_DOCUMENT_ROOT.$opinion['imagen'])): ?>
						<a class="ligthbox" href="<?=CONFIG_SITE_URL.$opinion['imagen']?>">&#8220;<?=$comentario?>&#8221;</a><?=$leermas?>
					<?	else: ?>
						&#8220;<?=$comentario?>&#8221;<?=$leermas?>
					<?	endif; ?>
					</p>
					<p class="talker"><?=htmlentities($opinion['emisor'])?><br><em>- <?=$opinion['medio']?> -</em></p>
				</div>
				<? endforeach; ?>
			</div>
			
			
			
		</div>
		
	</div>

</div>


