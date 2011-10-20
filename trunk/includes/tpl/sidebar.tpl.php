<div class="sidebar">
	<ul class="list">
		<? foreach ($sections[$tab]['sub'] as $key => $subsection): ?>
			<li><a <? if ($key == $section): ?> class="selected" <? endif ?> href="/web/<?=$subsection['url']?>"><?=$subsection['alias']?></a></li>
		<? endforeach; ?>
	</ul>
	<div class="pastilla"><a href="catalogo.pdf">Ver cat&aacute;logo propio (PDF)</a></div>
	<? if ($pipala): ?>
		<div class="pipalablog">
			<a href="http://ahpipala.blogspot.com">
				<img src="/img/pipalablog.png"/>
			</a>
		</div>
	<? endif; ?>
</div>