<?php

$theme = strtolower($title_theme);

$image_theme = new Image();

$image_theme = $image_theme -> getImageByTheme ($theme);
 
 if ($image_theme === false){
 $msg_error = 'Une des mages n\'est pas disponible sur le serveur eu le bdd.';
 }
 else
 {
 $display_image_theme = $image_theme;
 }
