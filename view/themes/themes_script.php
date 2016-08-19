<?php
/* View */
header('Content-Type: text/js');
?>

/* Comment to enable the JS coloration in IDE
<script>
// */

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

var Theme = function (_name, _url, _color) {
	this.name = _name;
	this.url = _url;
    this.color = _color;
}

var themes = [
<?php
class ThemeShowed {
	public function __construct($name, $url, $color) {
		$this->name = $name;
		$this->url = $url;
		$this->color = $color;
	}
	public $name, $url, $color;
}
$themesShowed = [];

$iTheme = 0;
foreach($themes as $theme) {
	$themesShowed[] = new ThemeShowed($theme->getName(), $theme->getUrl(), $theme->getColor());
}
$themesShowed[] = new ThemeShowed('', '/', 'FFF');

foreach($themesShowed as $theme) {
	echo 'new Theme(\''.str_replace('\'', '\\\'', mb_strtoupper($theme->name, 'UTF-8')).'\', \''.$theme->url.'\', \'#'.$theme->color.'\')';

	if($iTheme < sizeof($themesShowed)-1) {
		echo ',';
	}
	$iTheme++;
}
?>
];

function clear() {
	$('#themes').html('');
}

function enableLinks() {
	
	$('.theme').click( function(event) {
    	event.preventDefault();
		
		var target = $(event.target);
		if(event.target.nodeName == 'TD') {
			target = target.children().last();
		}
    	
		var location = $(target).attr('href');
		window.location = location;
    });
	
}


function addLine(iLine, nbColumns) {
	$('#themes').append('<tr class="line" id="line-'+iLine+'"></tr>');

	for(var iColumn=0; iColumn<nbColumns; iColumn++) {
		$('#line-'+iLine).append('<td class="cel" id="column-'+iLine+'-'+iColumn+'"></td>');
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
	
	return true;
}

function createGride() {
	
	clear();
	
	var succes = false;
	var nbFails = 0;
	
	var width = $('html').width() - 17;
	var nbColumns = Math.floor(width / 200);

	var height = $('html').height() - 17;
	var nbLines = Math.floor(height / 70);
	
	if (nbColumns <= 1) {
		return false;
	}
	
	while(!succes && nbFails<10) {
		clear();
		
		var themeList = themes.slice();
		shuffle(themeList);

		var nbRestingCels = nbColumns * nbLines - nbLines;
		
		var iLine=0;
		while (themeList.length > 0) {
			addLine(iLine, nbColumns);

			for (var iColumn=0; iColumn<nbColumns; iColumn++) {

				if (isPossible(iLine, iColumn) && (nbRestingCels<=0 ? true : Math.random()<(themeList.length/nbRestingCels))) {
					var last = themeList.pop();

					$('#column-'+iLine+'-'+iColumn)
						.addClass('theme')
						.css('backgroundColor', last.color)
						.html('<a href="'+last.url+'">'+last.name+'</a>');	

					if (themeList.length == 0) {
						break;
					}
				}

				nbRestingCels--;
			}

			iLine++;
		}
		
		if(iLine <= nbLines) {
			succes = true;
		}
		else {
			nbFails++;
		}
		
		for(var iNewLine=1; iNewLine<=nbLines-iLine; iNewLine++) {
			addLine(iLine+iNewLine, nbColumns);
		}
	}

	$('.column').width('calc('+100/nbColumns+'% - 1px)');
	$('.column:first-child').width('calc('+100/nbColumns+'% - 2px)');
	
	if (!succes) {
		return false;
	}
	
	enableLinks();
	
	return true;
}


function createList() {
	clear();
	
	var list = $('#themes');
	
	themes.forEach(function(theme) {
		list.append('<tr class="line"><td class="column theme" style="width:100%; background-color:'+theme.color+';"><a href="'+theme.url+'">'+theme.name+'</a></td></tr>');
	});
	
	enableLinks();
}


function create() {
	if (!createGride()) {
		createList();
	}
}


$(document).ready(function() {
	create();
});

var timeout;
$(window).resize(function() {
	clearTimeout(timeout);
	timeout = setTimeout(create, 100);
});
