<div class="ribbon"><img src="ribbon-novedades.png"></div>
<ul class="books equal init">
	<? foreach ($listado as $libro): ?>
		<li>
			<a href="/web/destacado/<?=$libro['id_libro']?>">
				<img class="front" src="/uploads/libros/<?=$libro['imagen']?>">
				<p class="author"><?=$libro['autor']?></p>
				<p class="title"><?=$libro['titulo']?></p>
				<p class="price">$ <?=$libro['precio']?> .-</p>
			</a>
		</li>
	<? endforeach; ?>
</ul>
