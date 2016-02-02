<?php
/* View */

function show_theme_script() {
	?>
/* Comment to enable the JS coloration in Eclipse
<script>
// */
$(document).ready(function() {
	
	var width = $(document).width();
	var nbColumns = Math.floor(width / 100);
	
	for(var iLine=0; iLine<10; iLine++) {

		$("#themes").append('<div class="line" id="line-'+iLine+'"></div>');
		
		for(var iColumn=0; iColumn<nbColumns; iColumn++) {
			
			$("#line-"+iLine).append('<div class="column" id="column-'+iLine+'-'+iColumn+'"></div>');
			
		}
		
	}

	$('.column').width('calc('+100/nbColumns+'% - 1px)');
	$('.column:first-child').width('calc('+100/nbColumns+'% - 2px)');

});
	<?php
}
