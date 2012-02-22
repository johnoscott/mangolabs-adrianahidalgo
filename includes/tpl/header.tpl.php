<!doctype html>
<html lang="en">

<head>

<meta charset="utf-8" />
<title>Adriana Hidalgo Editora</title>

<!-- STYLES
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!-- Reset     --> 				<link rel="stylesheet" href="/css/reset.css" type="text/css" media="screen" charset="utf-8" />
<!-- Styles    --> 				<link rel="stylesheet" href="/css/styles.css" type="text/css" media="screen" charset="utf-8" />
<!-- Styles    --> 				<link rel="stylesheet" href="/css/jquery.lightbox-0.5.css" type="text/css" media="screen" charset="utf-8" />


<!-- FONTS
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!-- AvenirLTStd55Roman --> 	<link rel="stylesheet" href="/css/fonts/AvenirLTStd55Roman/stylesheet.css" type="text/css" media="screen" charset="utf-8" />
<!-- AvenirLTStd95Black --> 	<link rel="stylesheet" href="/css/fonts/AvenirLTStd95Black/stylesheet.css" type="text/css" media="screen" charset="utf-8" />
<!-- AvenirLTStd95Black --> 	<link rel="stylesheet" href="/css/fonts/AvenirLTStd85Heavy/stylesheet.css" type="text/css" media="screen" charset="utf-8" />


<!-- JS
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="/js/jquery.lightbox-0.5.js"></script>
<script src="/js/modal.js"></script>
<script src="/js/global.js"></script>


</head>

<body <? if ($pipala):?> class="pipala" <? endif; ?> >

<div class="fixed">

	<a class="logo" href="/web/"><img src="/img/adriana-hidalgo<? if ($pipala):?>-pipala<? endif; ?>.png"></a>
	
	<ul class="menu">
		<? foreach ($sections as $key_sections => $value_sections): ?>
			<? if (!$value_sections['hidden']): ?>
				<li><a <? if($tab == $key_sections): ?> class="selected" <? endif ?> href="/web/<?=$value_sections['url']?>"><?=$value_sections['alias']?></a></li>
			<? endif; ?>
		<? endforeach; ?>
	</ul>
	
	
	<div class="toolbar">
		<form id="form-search" action="/web/busqueda/titulo/" method="post">
			<div style="text-align: right;">
				<a href="#">ENGLISH</a> | 
				<a href="/web/contacto/">CONTACTO</a>
			</div>
			<div class="cart" style="visibility: hidden;">
				<div class="left">
					<a href="/web/shop/items/">Mis compras</a>
					<a href="/web/shop/checkout/">Checkout</a>
				</div>
				<div class="bag">0</div>
				<div class="pay">$ 00,00</div>
			</div>
			<input type="text" placeholder="Buscar..." name="search">
		</form>
	</div>

</div>

<div class="container">
