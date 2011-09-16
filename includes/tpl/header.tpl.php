<!doctype html>
<html lang="en">

<head>

<meta charset="utf-8" />
<title>Adriana Hidalgo Editora</title>

<!-- STYLES
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!-- Reset     --> 				<link rel="stylesheet" href="/css/reset.css" type="text/css" media="screen" charset="utf-8" />
<!-- Styles    --> 				<link rel="stylesheet" href="/css/styles.css" type="text/css" media="screen" charset="utf-8" />


<!-- FONTS
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!-- AvenirLTStd55Roman --> 	<link rel="stylesheet" href="/css/fonts/AvenirLTStd55Roman/stylesheet.css" type="text/css" media="screen" charset="utf-8" />
<!-- AvenirLTStd95Black --> 	<link rel="stylesheet" href="/css/fonts/AvenirLTStd95Black/stylesheet.css" type="text/css" media="screen" charset="utf-8" />

</head>

<body>



<div class="container">

	<a class="logo" href="/"><img src="/img/adriana-hidalgo-editora.gif"></a>
	
	<ul class="menu">
		<? foreach ($sections as $key_sections => $value_sections): ?>
			<li><a <? if($tab == $key_sections): ?> class="selected" <? endif ?> href="/web/<?=$value_sections['url']?>"><?=$value_sections['alias']?></a></li>
		<? endforeach; ?>
	</ul>
	
	<div class="toolbar">
		english | mapa del sitio | contacto
		<div class="cart">
			<div class="left">
				<a href="/web/shop/items/">Mis compras</a>
				<a href="/web/shop/checkout/">Checkout</a>
			</div>
			<div class="bag">2</div>
			<div class="pay">$ 79,00</div>
		</div>
		<input type="text" placeholder="Buscar...">
	</div>
