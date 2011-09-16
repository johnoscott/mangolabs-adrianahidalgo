<hr>
<ul class="catalog equal">
	<? foreach ($libros as $key_libro => $value_libro): ?>
		<li>
			<a href="/web/libro/42/">
				<img class="front" src="/img/tapas/cover01.jpg">
				<p class="author"><?=$value_libro['autor']?></p>
				<p class="title"><?=$value_libro['titulo']?></p>
				<p class="price">$ <?=$value_libro['precio']?>,00 .-</p>
			</a>
		</li>
	<? endforeach; ?>
</ul>