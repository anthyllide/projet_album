<?php
if(!empty($_GET['id'])){
	$id = strip_tags($_GET['id']);

	$theme3 = new Theme;
	
	//si l'utilisation modifie l'url
	if ($id >26 OR $id <1)
	{
	header('location:index.php');
	exit;
	}
	else
	{
	$selectLetter = $theme3 -> selectLetter ($id);
	
	$displayTheme = $theme3 -> displayTheme($id);

		
	$letter = $selectLetter;
	$title_theme = $displayTheme;

	}		
}		
	
	
	
	
	
	
	
