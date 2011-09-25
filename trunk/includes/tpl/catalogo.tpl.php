
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main catalogo">

		
		
		<!-- COLECCION -->
		
		<? if ($section == 'coleccion'): ?>
		
			<? if (!$libros): ?>
			
				<!-- Busqueda -->
				
				<ul class="list">
				
					<? foreach($colecciones as $key => $coleccion): ?>
					
						<li><a href="/web/catalogo/coleccion/<?=$key?>"><?=$coleccion['nombre']?></a></li>
					
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
		
			<!-- Busqueda -->
		
			<select data-action="titulo" class="large">
				<option value="">Seleccionar una letra</option>
				<? foreach($letras as $letra): ?>
					<option <? if (strtoupper($letra) == $params['titulo']): ?> selected <? endif; ?> ><?=ucfirst($letra)?></option>
				<? endforeach; ?>
			</select>
			<hr>
				
			<!-- Listado -->
			
			<? include('includes/tpl/libros.tpl.php'); ?>			
		
		<? endif; ?>
		
		


	
		<!-- AUTOR -->
		
		<? if ($section == 'autor'): ?>
		
			<? if (!$libros): ?>
		
			<!-- Busqueda -->
		
				<select data-action="autor" class="large">
					<option value="">Seleccionar una letra</option>
					<? foreach($letras as $letra): ?><option><?=ucfirst($letra)?></option><? endforeach; ?>
				</select>
				<hr>
				<ul>
					<? foreach($autores as $key => $autor): ?>
						<li <? if ($autor['nombre'][0] != 'A'): ?> class="hide" <? endif; ?> data-letra="<?=$autor['nombre'][0]?>"><a href="/web/catalogo/autor/<?=$key?>"><?=$autor['nombre']?></a></li>
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
				
					<? foreach($generos as $key => $genero): ?>
					
						<li><a href="/web/catalogo/genero/<?=$key?>"><?=$genero['nombre']?></a></li>
					
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

