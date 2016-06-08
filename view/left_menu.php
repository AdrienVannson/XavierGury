<?php
/* View */
include_once(__DIR__."/../model/Theme.class.php");

function show_left_menu($id_project) {
	
	$first_level_projects = get_first_level_projects();
	$project = new Project($id_project);
	
	?>
	
	
	<div id="menu">
		<ul>
			<?php 
			$projects = $project->get_brothers();
			
			foreach($projects as $project) {
				?>
				<li>
					<a 
						href="<?php echo $project->get_url();?>"
						<?php if($project->get_id()==$id_project){?>class="active"<?php }?>
					>
						<?php echo mb_strtoupper($project->get_name(), "UTF-8");?>
					</a>
				</li>
				<?php
			}
			?>
		</ul>
		
		<div id="color_menu">
			
			<?php 
			foreach($themes as $theme) {
				?>
				<a
					<?php if($theme->get_id()==$currentTheme->get_id()){?>id="color_item_activate"<?php }?>
					class="color_item"
					style="background-color: #<?php echo $theme->get_color();?>;"
					href="/<?php echo $theme->get_id();?>-<?php echo $theme->get_name_formatted();?>"
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