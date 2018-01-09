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

	this.regex = /^\#(\d+)-([01])$/; // Parse the hash


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

(function() {

	var picturePreview = document.getElementById('picture-preview');
	var informations = document.getElementById('informations');
	var frame = document.getElementById('frame');
	var close = document.getElementById('close');


	function openPreview ()
	{
		picturePreview.style.display = 'block';
		setTimeout(function(){
			picturePreview.style.opacity = '1';
		}, 50);

		hash.openPreview();
		changeActivePicture(hash.idPicture()); // Load the large picture
	}

	function closePreview ()
	{
		picturePreview.style.opacity = '0';
		setTimeout(function(){
			picturePreview.style.display = 'none';
		}, 500);

		hash.closePreview();
	}

	function avancer (x)
	{
		var nouvelId = (hash.idPicture() + x) % infosPictures.length;

		if (nouvelId < 0) {
			nouvelId += infosPictures.length;
		}
		
		changeActivePicture(nouvelId);
	}

	function nextPicture ()
	{
		avancer(1);
	}

	function previousPicture ()
	{
		avancer(-1);
	}


	function showPicture (id)
	{
		openPreview();
		changeActivePicture(id);
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

		// Hide or show the information panel
		if (infosPictures[id].name == '' && infosPictures[id].description == '') {
			informations.style.display = 'none';
			pictureContainer.className = '';
		}
		else {
			informations.style.display = 'block';
			pictureContainer.className = 'picture-container-margin';
		}

		if (hash.isPreviewOpen()) { // Don't load the large picture while the preview is closed
			picture = document.createElement('img');
			picture.src = infosPictures[id].urlLarge;
			picture.id = 'picture';

			pictureContainer.appendChild(picture);
		}

		// Update the hash
		hash.setIdPicture(id);
	});



	window.openPreview = openPreview;
	window.closePreview = closePreview;

	window.nextPicture = nextPicture;
	window.previousPicture = previousPicture;
	window.avancer = avancer;

	window.showPicture = showPicture;

})();


/*
 * Events
 */

(function() {

	if (typeof isBook == 'undefined') {

		var pictures = document.getElementsByClassName('project-picture');

		var event = 'click';
		if (typeof isCarousel !== 'undefined') {
			event = 'dblclick';
		}

		for (var iPicture=0; iPicture<pictures.length; iPicture++) {
			pictures[iPicture].addEventListener(event, function(event) {
				showPicture(parseInt(event.currentTarget.id.split('-')[1]));
			});
		}

	}

})();


/*
 * Carousels
 */

(function() {
	if (typeof isCarousel !== 'undefined') {

		$(document).ready(function(){
			document.getElementById('pictures').className = 'carousel';

			var nbChangesInProgress = 1;

			var carousel = $('#pictures')
				.slick({
					centerMode:        true,
					focusOnSelect:     true,
					infinite:          false,
					lazyLoad:          'ondemand',
					slidesToShow:      8, // Used by the lazy-loading
					slidesToScroll:    1,
					speed:             500,
					swipeToSlide:      false,
					variableWidth:     true,
					waitForAnimate:    false
				})
				.slick('slickGoTo', hash.idPicture(), false)

				.on('beforeChange', function(event, slick, currentSlide) {
					nbChangesInProgress += 1;
				})

				.on('afterChange', function(event, slick, currentSlide) {
					nbChangesInProgress -= 1;

					if (nbChangesInProgress == 0) {
						changeActivePicture(currentSlide);
					}
				});

			onActivePictureChange.push(function (id) {
				if (id != carousel.slick('slickCurrentSlide')) {
					carousel.slick('slickGoTo', id, false);
				}
			});

			onActivePictureChange.push(function (id) {
				$('#slider').slider("value", id);
			});
		});

	}
})();


/*
 * Books
 */

(function() {
	if (typeof isBook !== 'undefined') {

		$(document).ready(function(){

			$('#pictures').bind('turned', function(event, page, obj) {
				changeActivePicture(page-1);
			});

			onActivePictureChange.push(function (id) {
				if (id+1 != $('#pictures').turn('page')) {
					$('#pictures').turn('page', id+1);
				}
			});

		});

	}
})();



/*
 * After loading the page, show the right picture and eventually open the preview
 */

(function () {

	var infos = document.getElementById('informations');
	infos.innerHTML = '<h1 id="title"></h1><p id="description"></p>';


	if (nbPictures > 0) {
		if (hash.isPreviewOpen()) {
			openPreview();
		}

		changeActivePicture(hash.idPicture());
	}
})();
