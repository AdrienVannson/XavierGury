<?php
/* View */

function show_admin_errors() {
	
	if(!isset($_SESSION["errors"])) {
		return;
	}
	
	foreach($_SESSION["errors"] as $message) {
	?>

		<div class="row">
			<div class="col s12 m6">
				<div class="card red">
					<div class="card-content white-text">
						<span class="card-title">ERREUR</span>
						<p><?php echo $message;?></p>
					</div>
				</div>
			</div>
		</div>

	<?php
	}
	
	$_SESSION["errors"] = array();
}