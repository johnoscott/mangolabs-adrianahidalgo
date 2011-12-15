<hr>
<ul class="catalog equal">
	<? foreach ($libros as $libro): ?>
		<li>
			<a href="/web/libro/<?=$libro['id_libro']?>/">
				<img class="front" src="/uploads/libros/<?=$libro['imagen']?>">
				<p class="author"><?=htmlentities($libro['autor'])?></p>
				<p class="title"><?=htmlentities($libro['titulo'])?></p>
				<p class="price">$ <?=$libro['precio']?> .-</p>
			</a>
		</li>
	<? endforeach; ?>
</ul>
