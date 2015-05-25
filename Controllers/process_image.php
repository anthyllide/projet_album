<?php
if (isset($_POST['theme'])){


	if(isset($_POST['upload_submit']))
	{
	
	$files = $_FILES['upload'];
	
	$theme = strtolower($_POST['theme']);
	
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
	
	
}	
