<?php
$image = new Image();

$display_images = $image -> getImage ();

if ($display_images === false) {
	$msg_error = 'L\'image n\'existe pas sur le serveur ou dans la base de données.';
}
else
{
	$images = $display_images;
}
