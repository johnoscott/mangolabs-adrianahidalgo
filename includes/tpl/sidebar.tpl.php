<div class="sidebar">
	<ul class="list">
		<? foreach ($sections[$tab]['sub'] as $key => $subsection): ?>
			<li><a <? if ($key == $section): ?> class="selected" <? endif ?> href="/web/<?=$subsection['url']?>"><?=$subsection['alias']?></a></li>
		<? endforeach; ?>
	</ul>
	<div class="pastilla"><a href="catalogo.pdf">Ver cat&aacute;logo (PDF)</a></div>
	<? if ($pipala): ?>

<script language="JavaScript" src="/js/flash.js"></script>
<script language="JavaScript">
	function toggleVisibility(demo){
		if (demo.style.visibility=="hidden"){
			demo.style.visibility="visible";
			}
		else {
			demo.style.visibility="hidden";
			}
		}
</script>



		<div class="pipalablog">
			<a href="http://ahpipala.blogspot.com">
				<div class="animacion" id="demo"><script>CreaSwf('/img/pipala2.swf','160','300','');</script></div>
<!--				<img src="/img/pipalablog.png"/>-->
			</a>
		</div>
	<? endif; ?>
</div>
