<?php
/* View */

function show_theme_script($themes) {
	?>
/* Comment to enable the JS coloration in Eclipse
<script>
// */

var Theme = function(_name="", _color="") {
	this.name = _name;
    this.color = _color;
}

function addLine(iLine, nbColumns) {
	$('#themes').append('<div class="line" id="line-'+iLine+'"></div>');

	for(var iColumn=0; iColumn<nbColumns; iColumn++) {
		$('#line-'+iLine).append('<div class="column" id="column-'+iLine+'-'+iColumn+'"></div>');
	}
}

function isPossible(iLine, iColumn) {
	
	for(var iLineNextTo=iLine-1; iLineNextTo<=iLine+1; iLineNextTo++) {
		for(var iColumnNextTo=iColumn-1; iColumnNextTo<=iColumn+1; iColumnNextTo++) {
			
			if( $('#column-'+iLineNextTo+'-'+iColumnNextTo).hasClass('theme') ) {
				return false;
			}
			
		}
	}
	
	var random = Math.random();
	return random < 0.1; // Environ 1/10 de chance
}

$(document).ready(function() {
	
	var themes = [
	<?php
	$iTheme = 0;
	foreach($themes as $theme) {
		echo "new Theme('".$theme->get_name()."', '#".$theme->get_color()."')";
		
		if($iTheme < sizeof($themes)-1) {
			echo ",";
		}
	}
	?>
	];
	
	var width = $(document).width();
	var nbColumns = Math.floor(width / 200);

	var iLine=0;
	while(themes.length>0 && iLine<100) {
		addLine(iLine, nbColumns);
		
		for(var iColumn=0; iColumn<nbColumns; iColumn++) {

			if(isPossible(iLine, iColumn)) {
				var last = themes.pop();
				
				$('#column-'+iLine+'-'+iColumn)
					.addClass('theme')
					.css('backgroundColor', last.color)
					.html(last.name);
				

				if(themes.length == 0) {
					break;
				}
			}
			
		}

		iLine++;
	}

	$('.column').width('calc('+100/nbColumns+'% - 1px)');
	$('.column:first-child').width('calc('+100/nbColumns+'% - 2px)');

});
	<?php
}
