
<div class="content">

	<? #include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main catalogo" style="margin-left: 0;">

		
		
		<!-- COLECCION -->
		
		<? if ($section == 'coleccion'): ?>
		
			<? if (!$libros): ?>
			
				<!-- Busqueda -->
				
				<ul class="list">
				
					<? foreach($colecciones as $coleccion): ?>
					
						<li><a href="/web/catalogo/coleccion/<?=$coleccion['id_coleccion']?>"><?=$coleccion['nombre']?></a></li>
					
					<? endforeach; ?>
					
				</ul>
				
			<? else: ?>
				
			<!-- Listado -->
			
				<div class="detail">
					<h2 class="selected"><?=$colecciones[current($params)]['nombre']?></h2>
					<h5><?=$colecciones[current($params)]['descripcion']?></h5><hr>
				</div>
			
				<? include('includes/tpl/libros.tpl.php'); ?>
			
			<? endif; ?>
		
		<? endif; ?>
		
		
		


	
		<!-- TITULO -->
		
		<? if ($section == 'titulo'): ?>
		
			<div class="resultados">Se encontraron <?=$resultados?> resultados con la palabra "<?=$_REQUEST['params']?>"</div>
			<hr>

			<!-- Listado -->
			
			<? include('includes/tpl/libros.tpl.php'); ?>			
		
		<? endif; ?>
		
		


	
		<!-- AUTOR -->
		
		<? if ($section == 'autor'): ?>
		
			<? if (!$libros): ?>
		
			<!-- Busqueda -->
		
				<ul>
					<? foreach($autores as $key => $autor): ?>
						<li <? if ($autor['nombre'][0] != $params['autor']): ?> class="hide" <? endif; ?> data-letra="<?=$autor['nombre'][0]?>"><a href="/web/catalogo/autor/<?=$key?>"><?=$autor['nombre']?></a></li>
					<? endforeach; ?>
				</ul>
				
			<? else: ?>
				
			<!-- Listado -->
			
				<div class="detail">
					<h2 class="selected"><?=$autores[current($params)]['nombre']?></h2>
					<h5><?=$autores[current($params)]['descripcion']?></h5>
				</div>
			
				<? include('includes/tpl/libros.tpl.php'); ?>
			
			<? endif; ?>
		
		<? endif; ?>
		


		
		
		<!-- GENERO -->
		
		<? if ($section == 'genero'): ?>
		
			<? if (!$libros): ?>
			
				<!-- Busqueda -->
				
				<ul class="list">
				
					<? foreach($generos as $genero): ?>
					
						<li><a href="/web/catalogo/genero/<?=$genero['id_genero']?>"><?=$genero['nombre']?></a></li>
					
					<? endforeach; ?>
					
				</ul>
				
			<? else: ?>
				
			<!-- Listado -->
			
				<div class="detail">
					<h2 class="selected"><?=$generos[current($params)]['nombre']?></h2>
					<h5><?=$generos[current($params)]['descripcion']?></h5>
				</div>
			
				<? include('includes/tpl/libros.tpl.php'); ?>
			
			<? endif; ?>
		
		<? endif; ?>
		
		
		
		
		
		
		
		
		
		
		
	</div>

</div>
