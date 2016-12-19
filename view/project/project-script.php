<?php
/* View */

header('Content-Type: text/js');
?>
/* <script> /* */

/*
 * Refresh pictures
 */

if (usePicturesRefresh) {
	var urls = [];
	for (var iPicture=0; iPicture<nbPictures; iPicture++) {
		if (document.getElementById('picture-'+iPicture)) {
			urls[iPicture] = document.getElementById('picture-'+iPicture).src;
		}
		else {
			toRefresh[iPicture] = -1;
		}
	}

	function refresh ()
	{
		var succes = true;
		
		for (var iPicture=0; iPicture<nbPictures; iPicture++) {
			if (toRefresh[iPicture] != -1) { // Need a refresh
				succes = false;
				toRefresh[iPicture]++;
				document.getElementById('picture-'+iPicture).src = urls[iPicture] + '?refresh=' + toRefresh[iPicture];
			}
		}
		
		if (!succes) {
			setTimeout(refresh, 32*1000);
		}
	}
	setTimeout(refresh, 10*1000);
}


/*
 * Preview
 */

var picturePreview = document.getElementById('picture-preview');
var frame = document.getElementById('frame');
var close = document.getElementById('close');

var currentPicture = 0;


function closePreview ()
{
	picturePreview.style.opacity = '0';
	setTimeout(function(){
		picturePreview.style.display = 'none';
	}, 500);
}

function showPicture (id)
{
	currentPicture = id;
	
	var title = document.getElementById('title');
	var description = document.getElementById('description');
	var picture = document.getElementById('picture');

	picturePreview.style.display = 'block';
	setTimeout(function(){
		picturePreview.style.opacity = '1';
	}, 50);
	
	picture.src = infosPictures[id].urlLarge;
	title.innerText = infosPictures[id].name;
	description.innerHTML = infosPictures[id].description;
}

function nextPicture ()
{
	currentPicture = (currentPicture+1) % infosPictures.length;
	showPicture(currentPicture);
}

function previousPicture ()
{
	currentPicture = (currentPicture-1 + infosPictures.length) % infosPictures.length;
	showPicture(currentPicture);
}
