<?php
session_start();
require_once ('config.php'); 
require_once('Models/Theme.class.php');
require_once ('Models/Image.class.php');
require_once ('Controllers/process_menu.php');
require_once ('Controllers/process_img_theme.php');


?>

<!DOCTYPE html>
<html lang='fr'>

<head>
<meta charset='UTF-8'/>
<title><?php echo WEB_TITLE;?></title>
<link rel="stylesheet" href="Views/css/style.css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="wrapper">


<?php require_once('Views/partials/header.php'); 

?>


<div id="intro">

<p>Cet album contient de nombreuses photos, classées par thèmes. Cliquez sur la première lettre du thème recherché.
Pour agrandir les photos, il suffit de cliquer sur les miniatures.</p>

<p>Vous pouvez, si vous le souhaitez, ajouter vous aussi vos photos. Pour cela, vous devez créer un compte.</p>

</div>

<?php require('Views/partials/menu.php'); ?>

<div class="clear"></div>


<div id="contenu">

<?php 
if (isset($msg_error)){
?>
<div class="msg_error">
<p><?php echo $msg_error;?></p>
</div>
<?php 
}

if (!empty($_GET['id'])) {
require ('Views/partials/theme.php'); 
}
else
{
require ('Views/partials/contenu.php'); 
}



?>

</div>

<?php require ('Views/partials/footer.php'); ?>

</div>
</body>

</html>