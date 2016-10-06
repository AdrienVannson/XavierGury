<?php
/* View */
header('Content-Type: text/js');
?>

/* <script>// */

// Shuffle function
function shuffle(array) {
    for (var i=array.length-1; i>0; i--) {
        var j = Math.floor(Math.random() * (i+1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

function addLine(iLine, nbColumns) {
	$('#pictures').append('<tr id="line-'+iLine+'"></tr>');

	for(var iColumn=0; iColumn<nbColumns; iColumn++) {
		$('#line-'+iLine).append('<td id="column-'+iLine+'-'+iColumn+'"></td>');
	}
}


function createGrid () {
	
	$('#pictures').html('');
	
	var width = $('html').width() - 17;
	var nbColumns = Math.floor(width / 128);

	var height = $('html').height() - 17;
	var nbLines = Math.floor(height / 128);
	
	var picturesList = pictures.slice();
	shuffle(picturesList);


	var iLine = 0;
	while (picturesList.length > 0) {
		addLine(iLine, nbColumns);

		for (var iColumn=0; iColumn<nbColumns; iColumn++) {

			if (Math.random() > 0.9) {
				var last = picturesList.pop();

				$('#column-'+iLine+'-'+iColumn)
					.addClass('picture')
					.html('<a href="'+last.urlLink+'" title="'+last.name+'"><img src="'+last.urlPicture+'"/></a>');	

				if (picturesList.length == 0) {
					break;
				}
			}

		}

		iLine++;
	}
	
	for(var iNewLine=1; iNewLine<=nbLines-iLine; iNewLine++) {
		addLine(iLine+iNewLine, nbColumns);
	}

	$('.column').width('calc('+100/nbColumns+'% - 1px)');
	$('.column:first-child').width('calc('+100/nbColumns+'% - 2px)');
}


$(document).ready(function() {
	createGrid();
});

var timeout;
$(window).resize(function() {
	clearTimeout(timeout);
	timeout = setTimeout(createGrid, 100);
});
