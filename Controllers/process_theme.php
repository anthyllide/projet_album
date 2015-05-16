<?php
$theme1 = new Theme();

//utilisation méthode selectTheme pour afficher les themes dans menu déroulant page upload
$select_theme = $theme1 -> selectTheme();

	if ($select_theme === false)
	{
	$msg_error = 'Il n\'y a pas de thèmes';
	}
	else
	{
	$theme1 = $select_theme;
	}



if(isset($_POST['theme_submit'])) 
{

	if(empty($_POST['new_theme']))
	{
	$msg_error ='Veuillez entrer un nouveau thème.';
	}
	else
	{
	//récupération $_POST['new_theme']
	$new_theme = strip_tags(trim($_POST['new_theme']));
	//mise en minuscules
	$new_theme = strtolower($new_theme);
	//Transformation de la première lettre en majuscule
	$new_theme = ucfirst($new_theme);
	
	$theme2 = new Theme();
	
	// utilisation méthode createTheme pour insérer le nouveau thème dans la bdd
	$new_theme = $theme2 -> createTheme ($new_theme);
	
		if ($new_theme === true)
		{
		$_SESSION['msg_success'] = 'Nouveau thème enregistré';
		header('location:upload.php');
		exit;
		}
		else
		{
		$msg_error = $new_theme; 
		}
	}

}