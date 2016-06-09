<?php

function show_left_menu($id_project) {
	
	$first_level_projects = get_first_level_projects();
	$project = new Project($id_project);
	
	?>
	
	
	<div id="menu">
		<ul>
			<?php 
			if ($project->get_id_parent() == 0) {
				$projects = $project->get_children();
			}
			else {
				$projects = $project->get_brothers();
			}
			
			foreach($projects as $currentProject) {
				?>
				<li>
					<a 
						href="<?php echo $currentProject->get_url();?>"
						<?php if($currentProject->get_id()==$id_project){?>class="active"<?php }?>
					>
						<?php echo mb_strtoupper($currentProject->get_name(), "UTF-8");?>
					</a>
				</li>
				<?php
			}
			?>
		</ul>
		
		<div id="color_menu">
			
			<?php 
			foreach(get_first_level_projects() as $currentProject) {
				?>
				<a
					<?php if($project->get_id()==$currentProject->get_id()){?>id="color_item_activate"<?php }?>
					class="color_item"
					style="background-color: #<?php echo $currentProject->get_color();?>;"
					href="<?php echo $currentProject->get_url();?>"
				></a>
				<?php
			}
			?>
			
		</div>
	</div>
	
	<div class="line" id="line-menu"></div>
	<div class="line" id="line-bottom"></div>
	<div class="line" id="line-white-item-1"></div>
	<div class="line" id="line-white-item-2"></div>
	
	<div id="separator-bottom"></div>
	
	<a id="white-item" href="/"></a>
	
	<div id="menu-btn" onclick="
		if(document.body.id=='') {
			document.body.id = 'deplie';
		}
		else {
			document.body.id = '';
		}
	">
		<svg style="width:48px;height:48px" viewBox="0 0 24 24">
			<path fill="#FFF" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
		</svg>
	</div>
	
	<script>

	

	</script>
	
	<?php
}