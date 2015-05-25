<?php
//Titre du site
define('WEB_TITLE','Album photos');

//Nom répertoire images du site
define('IMAGES_DIR_NAME', 'images');

//Nom répertoire projet
define('WEB_DIR_NAME','projet_album');

//Nom répertoire images en vrac
define('IMAGE_VRAC_DIR_NAME','images_vrac');

//Nom répertoire images classées
define('IMAGE_REP_DIR_NAME','images_rep');

//Nom répertoire images miniatures
define('THUMBNAIL_REP_DIR_NAME','thumbnails_rep');

//Chemin répertoire images en vrac sur PC (C://WAMP/WWW/)
define('IMAGE_VRAC_DIR_PATH',$_SERVER['DOCUMENT_ROOT'].'/'.WEB_DIR_NAME.'/'.IMAGE_VRAC_DIR_NAME.'/');

//Chemin répertoire images classées sur PC (C://WAMP/WWW/)
define('IMAGE_REP_DIR_PATH',$_SERVER['DOCUMENT_ROOT'].'/'.WEB_DIR_NAME.'/'.IMAGE_REP_DIR_NAME.'/');

//Chemin répertoire images miniatures classées sur PC (C://WAMP/WWW/)
define('THUMBNAILS_REP_DIR_PATH',$_SERVER['DOCUMENT_ROOT'].'/'.WEB_DIR_NAME.'/'.THUMBNAIL_REP_DIR_NAME.'/');

//Chemin répertoire images du site sur PC (localhost)
define('IMAGES_DIR_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.WEB_DIR_NAME.'/'.IMAGES_DIR_NAME.'/');

//URL web du projet (localhost/)
define ('WEB_DIR_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.WEB_DIR_NAME.'/');

//URL web du répertoire images en vrac (localhost/)
define('IMAGES_VRAC_DIR_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.WEB_DIR_NAME.'/'.IMAGE_VRAC_DIR_NAME.'/');

//URL web du répertoire images classées
define('IMAGES_REP_DIR_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.WEB_DIR_NAME.'/'.IMAGE_REP_DIR_NAME.'/');

//URL web du répertoire images miniatures
define('THUMBNAIL_DIR_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.WEB_DIR_NAME.'/'.THUMBNAIL_REP_DIR_NAME.'/');

//Dimensions max images
define('MAX_WIDTH', 600);
define ('MAX_HEIGHT', 450);