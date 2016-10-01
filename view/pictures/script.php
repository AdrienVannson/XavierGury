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

var Picture = function (_urlFile, _urlLink) {
	this.urlFile = _urlFile;
    this.urlLink = _urlLink;
}

var pictures = [
<?php
class PictureShowed {
	public function __construct($urlFile, $urlLink) {
		$this->urlFile = $urlFile;
		$this->urlLink = $urlLink;
	}
	public $urlFile, $urlLink;
}
$picturesShowed = [];

$picturesShowed[] = new PictureShowed('http://localhost/1-Peintures/21-Les+100+je+me+sens/ressources/18m-Le+renard.jpg', 'http://localhost/1-Peintures/21-Les+100+je+me+sens');
$picturesShowed[] = new PictureShowed('http://localhost/1-Peintures/22-R%C3%AAveries/ressources/4m-D%C3%A9crocher+la+lune.jpg', 'http://localhost/1-Peintures/22-R%C3%AAveries');

$iPicture = 0;

foreach($picturesShowed as $picture) {
	echo "new Picture('" . $picture->urlFile . "', '" . $picture->urlLink."')";

	if($iPicture < sizeof($picturesShowed)-1) {
		echo ',';
	}
	$iPicture++;
}
?>
];

function addLine(iLine, nbColumns) {
	$('#pictures').append('<tr class="line" id="line-'+iLine+'"></tr>');

	for(var iColumn=0; iColumn<nbColumns; iColumn++) {
		$('#line-'+iLine).append('<td class="cel" id="column-'+iLine+'-'+iColumn+'"></td>');
	}
}


function createGrid () {
	
	$('#pictures').html('');
	
	var width = $('html').width() - 17;
	var nbColumns = Math.floor(width / 128);

	var height = $('html').height() - 17;
	var nbLines = Math.floor(height / 128);
	
	
	var pictureList = pictures.slice();
	shuffle(pictureList);


	var iLine=0;
	while (pictureList.length > 0) {
		addLine(iLine, nbColumns);

		for (var iColumn=0; iColumn<nbColumns; iColumn++) {

			if (Math.random() > 0.9) {
				var last = pictureList.pop();

				$('#column-'+iLine+'-'+iColumn)
					.addClass('picture')
					.html('<a href="'+last.urlLink+'"><img src="'+last.urlFile+'"/></a>');	

				if (pictureList.length == 0) {
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
