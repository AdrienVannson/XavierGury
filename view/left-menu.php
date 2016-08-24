<?php

function show_left_menu($project) {
	
	$first_level_projects = getFirstLevelProjects();
	
	?>

<div id="menu">
	<ul>
		<?php 
		if ($project->getIdParent() == 0) {
			$projects = $project->getChildren();
			$parent = $project;
		}
		else {
			$projects = $project->getBrothers();
			$parent = $project->getParent();
		}
		
		?>
		
		<li style="border-bottom: 1px solid #FFF;">
			<a
				href="<?php echo $parent->getUrl();?>"
				<?php if($parent->getId() == $project->getId()){?>class="active"<?php }?>
			>
				<?php echo mb_strtoupper($parent->getName(), 'UTF-8'); ?>
			</a>
		</li>
		
		<?php
		foreach($projects as $currentProject) {
			?>
			<li>
				<a 
					href="<?php echo $currentProject->getUrl();?>"
					<?php if($currentProject->getId()==$project->getId()){?>class="active"<?php }?>
				>
					<?php echo mb_strtoupper($currentProject->getName(), 'UTF-8');?>
				</a>
			</li>
			<?php
		}
		?>
	</ul>

	<div id="colored-menu">
		
		<?php 
		foreach(getFirstLevelProjects() as $currentProject) {
			if ($currentProject->getId() == 10) {
				continue;
			}
			?>
			<a
				<?php
				if ($project->getFirstLevelParent()->getId() == $currentProject->getId()) { ?>
			   		id="colored-item-activated"
			   	<?php }?>
				class="colored-item"
				style="background-color: #<?php echo $currentProject->getColor();?>;"
				href="<?php echo $currentProject->getUrl();?>"
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

<a id="white-item" href="/"></a>

<div id="separator-bottom"></div>

<div id="menu-btn" onclick="
	if(document.body.id=='') {
		document.body.id = 'unfloded';
	}
	else {
		document.body.id = '';
	}
">
	<svg style="width:48px;height:48px" viewBox="0 0 24 24">
		<path fill="#FFF" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
	</svg>
</div>

	<?php
}