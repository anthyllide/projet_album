<?php
if(!empty($_GET['theme'])){

	$theme = strip_tags($_GET['theme']);
	
	$image = new Image();
		
	$image_theme = $image -> getImageByTheme ($theme);
	
	if ($image_theme === false){
	$msg_error = 'Une des images n\'est pas disponible sur le serveur.';
	}
		else
		{
		$image_theme = $image_theme;
		}
	}