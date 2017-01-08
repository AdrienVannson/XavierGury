<?php
/* View */

header('Content-Type: text/js');
?>
/* <script> /* */
"use strict";

/*
 * Hash
 */

var hash = new (function () {

	this.init = function () {
		if (!/^\#\d+-[01]$/.test(window.location.hash) ) {
			window.location.hash = '0-0';
		}
	}

	this.regex = /^\#(\d)+-([01])$/; // Parse the hash


	this.idPicture = function ()
	{
		this.init();
		return +window.location.hash.replace(this.regex, "$1");
	}

	this.setIdPicture = function (newId)
	{
		this.init();
		window.location.hash = window.location.hash.replace(this.regex, newId+"-$2");
	}


	this.isPreviewOpen = function ()
	{
		this.init();
		return +window.location.hash.replace(this.regex, "$2");
	}

	this.setIsPreviewOpen = function (isPreviewOpen)
	{
		this.init();
		window.location.hash = window.location.hash.replace(this.regex, "$1-"+(+isPreviewOpen));
	}

	this.openPreview = function ()
	{
		this.setIsPreviewOpen(true);
	}

	this.closePreview = function ()
	{
		this.setIsPreviewOpen(false);
	}

});


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
 * Custom events
 */

var onActivePictureChange = []; // A list of functions called when the active picture change

function changeActivePicture (newId)
{
	onActivePictureChange.forEach(function(functionToCall) {
		functionToCall(newId);
	});
}


/*
 * Preview
 */

var picturePreview = document.getElementById('picture-preview');
var frame = document.getElementById('frame');
var close = document.getElementById('close');


function openPreview ()
{
	picturePreview.style.display = 'block';
	setTimeout(function(){
		picturePreview.style.opacity = '1';
	}, 50);

	hash.openPreview();
}

function closePreview ()
{
	picturePreview.style.opacity = '0';
	setTimeout(function(){
		picturePreview.style.display = 'none';
	}, 500);

	hash.closePreview();
}

onActivePictureChange.push(function (id) {
	var title = document.getElementById('title');
	var description = document.getElementById('description');
	
	title.innerText = infosPictures[id].name;
	description.innerHTML = infosPictures[id].description;

	// Change the picture
	var pictureContainer = document.getElementById('picture-container');

	var picture = document.getElementById('picture');
	if (picture) {
		pictureContainer.removeChild(picture);
	}

	picture = document.createElement('img');
	picture.src = infosPictures[id].urlLarge;
	picture.id = 'picture';

	pictureContainer.appendChild(picture);

	// Update the hash
	hash.setIdPicture(id);
});

function nextPicture ()
{
	changeActivePicture((hash.idPicture()+1) % infosPictures.length);
}

function previousPicture ()
{
	changeActivePicture((hash.idPicture()-1 + infosPictures.length) % infosPictures.length);
}


function showPicture (id)
{
	openPreview();
	changeActivePicture(id);
}


/*
 * After loading the page, open the preview if necessary
 */

(function (){
	hash.init();

	if (hash.isPreviewOpen()) {
		openPreview();
	}
	changeActivePicture(hash.idPicture());
})()
