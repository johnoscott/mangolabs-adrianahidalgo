<div class="sidebar">
	<ul class="list">
		<? foreach ($sections[$tab]['sub'] as $key => $subsection): ?>
			<li><a <? if ($key == $section): ?> class="selected" <? endif ?> href="/web/<?=$subsection['url']?>"><?=$subsection['alias']?></a></li>
		<? endforeach; ?>
	</ul>
	<div class="pastilla"><a href="/catalogo.pdf" target="_blank">Ver cat&aacute;logo (PDF)</a></div>
	<? if ($pipala): ?>


<script language="JavaScript" src="/js/flash.js"></script>

		<div class="pipalablog">
			<div id="demo"><script>CreaSwf('/img/pipala2.swf','160','300','');</script></div>
<!--				<img src="/img/pipalablog.png"/>-->
		</div>
	<? endif; ?>
</div>
