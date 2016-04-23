<?php
/* View */

function show_theme_script($themes) {
	?>
/* Comment to enable the JS coloration in IDE
<script>
// */

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
	$themesShowed[] = new ThemeShowed($theme->get_name(), $theme->get_url(), $theme->get_color());
}
$themesShowed[] = new ThemeShowed("", "/", "FFF");
shuffle($themesShowed);

foreach($themesShowed as $theme) {
	echo "new Theme('".str_replace("'", "\\'", mb_strtoupper($theme->name, "UTF-8"))."', '".$theme->url."', '#".$theme->color."')";

	if($iTheme < sizeof($themesShowed)-1) {
		echo ",";
	}
	$iTheme++;
}
?>
];


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
	
	return true;
}

function clear() {
	$('#themes').html('');
}

function createGride() {
	
	var succes = false;
	var nbFails = 0;
	
	var width = $(document).width();
	var nbColumns = Math.floor(width / 200);

	var height = $(document).height();
	var nbLines = Math.floor(height / 70);
	
	
	while(!succes && nbFails<10) {
		clear();
		
		var themeList = themes.slice();

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
						.html('<div></div><a href="'+last.url+'">'+last.name+'</a>');	

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
		
		for(var iNewLine=1; iNewLine<nbLines-iLine; iNewLine++) {
			addLine(iLine+iNewLine, nbColumns);
		}
	}

    $('.theme').click( function(event) {
    	event.preventDefault();
		
		var target = $(event.target);
		if(event.target.nodeName == 'DIV') {
			target = target.children().last();
		}
    	
		var location = $(target).attr('href');
		window.location = location;
    });

	$('.column').width('calc('+100/nbColumns+'% - 1px)');
	$('.column:first-child').width('calc('+100/nbColumns+'% - 2px)');
	
	if (!succes) {
		createList();
	}
}

function createList() {
	clear();
	
	$('#themes').html('<ul></ul>');
	var list = $('#themes ul');
	
	themes.forEach(function(theme) {
		list.append('<li>'+theme.name+'</li>');
	});
}

$(document).ready(function() {
	createGride();
});

/*$(window).resize(function() {
	createGride();
});*/

	<?php
}
