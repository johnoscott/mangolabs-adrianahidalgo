
<div class="content">

	<? include('includes/tpl/sidebar.tpl.php'); ?>
	
	<div class="main staff">
	
		<section>
		
			<dl>
			
				<? foreach ($staff as $puesto => $nombre): ?>
			
				  <dt><?=$puesto?></dt>
				  <dd><?=$nombre?></dd>
				  
				<? endforeach; ?>

			</dl>
			
		</section>
		
	</div>

</div>

