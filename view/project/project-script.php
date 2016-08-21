<?php
/* View */

header('Content-Type: text/js');
?>

/*
 * Refresh pictures
 */

var toRefresh = [];
toRefresh.length = nbPictures;
toRefresh.fill(0, 0, nbPictures);

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


/*
 * Preview
 */

var picturePreview = document.getElementById('picture-preview');
var picture = document.getElementById('picture');
var close = document.getElementById('close');
var title = document.getElementById('title');
var description = document.getElementById('description');


function closePreview ()
{
	picturePreview.style.opacity = '0';
	setTimeout(function(){
		picturePreview.style.display = 'none';
	}, 500);
}

function showPicture (source)
{
	picturePreview.style.display = 'block';
	setTimeout(function(){
		picturePreview.style.opacity = '1';
	}, 50);
	
	var id = parseInt(source.id.split('-')[1]);
	
	picture.src = infosPictures[id].urlLarge;
	title.innerText = infosPictures[id].name;
	description.innerHTML = infosPictures[id].description;
}
