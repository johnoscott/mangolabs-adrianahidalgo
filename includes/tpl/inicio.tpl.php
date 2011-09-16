<ul class="books equal">
	<? foreach ($books as $key_books => $value_books): ?>
		<li>
			<a href="/web/destacado/42/">
				<img class="front" src="/img/tapas/cover01.jpg">
				<p class="author"><?=$value_books['author']?></p>
				<p class="title"><?=$value_books['title']?></p>
				<p class="price">$ <?=$value_books['price']?> .-</p>
			</a>
		</li>
	<? endforeach; ?>
</ul>