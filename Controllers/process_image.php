<?php



	if(isset($_POST['upload_submit']))
	{
		if($_POST['theme'] !== 'defaut')
		{
	
	
	$files = $_FILES['upload'];
		
	$theme = mb_strtolower($_POST['theme'],'UTF-8');
	
	$image = new Image;
	
	$upload_image = $image -> upload($files,$theme);
	
		if ($upload_image === true)
		{
		$msg_success = 'Image(s) téléchargées.';
		}
		else
		{
		$msg_error = $upload_image;
		}
		
		}
		else
		{
		$msg_error = 'Sélectionnez un thème';
		}
	
	}
	



