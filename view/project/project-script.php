<?php
/* View */

function show_project_scripts() {
?>

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
	}, 1000);
}

function showPicture (source)
{
	picturePreview.style.display = 'block';
	setTimeout(function(){
		picturePreview.style.opacity = '1';
	}, 50);
	
	picture.src = source.src.replace('medium', 'large');
	title.innerText = source.title;
	description.innerHTML += source.alt;
}

<?php	
}