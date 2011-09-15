				<div class="menu">
					
					<div class="container">

						<ul class="tabs">

							<? foreach ($admin['secciones'] as $seccion => $url): ?>
							
								<li><a class="<?=strstr($_SERVER['REQUEST_URI'], $url)? 'active' : ''?>" href="<?=$url?>"><?=ucfirst($seccion)?></a></li>
								
							<? endforeach; ?>
						
						</ul>
						
					</div>
					
				</div>
