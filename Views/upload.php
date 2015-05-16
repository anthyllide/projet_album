<?php 
session_start();
require_once ('../config.php'); 
require_once('../Models/Theme.class.php');
require_once('../Models/Image.class.php');
require_once ('../Controllers/process_theme.php');
require_once ('../Controllers/process_image.php');

?>


<!DOCTYPE html>
<html lang='fr'>

<head>
<meta charset='UTF-8'/>
<title><?php echo WEB_TITLE;?></title>
<link rel="stylesheet" href="css/style.css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
</head>

<body>

<div id="wrapper">

<?php require('partials/header.php'); ?>

<h1 id="upload_h1">Upload de vos images</h1>



<?php 

if (isset($msg_error)){
			if(is_array($msg_error)){
			
				foreach ($msg_error as $value)
				{
				?>
				<div class="msg_errror">
				<p><?php echo $value;?></p>
				</div>
				<?php 
				}
			}
			else
			{
			?>
			<div class="msg_errror">
			<p><?php echo $msg_error;?></p>
			</div>
			<?php 
			}
}
elseif (isset($msg_success))
{
?>
<div class="msg_success">
<p><?php echo $msg_success;?></p>
</div>
<?php
}
elseif (isset($_SESSION['msg_success']))
{
?>
<div class="msg_success">
<p><?php echo $_SESSION['msg_success'];?></p>
</div>
<?php
}
?>

<form action="" method="post" enctype="multipart/form-data">

<div id="form_select">
<label for="theme">Choisissez votre thème</label>
<select name="theme" id="theme" value="Thèmes disponibles">
<option selected value="">Liste des thèmes</option>

<?php 
foreach ($theme1 as $id => $value)
{
?>
<option value="<?php echo $value;?>">
<?php 
echo $value;
?>
</option>
<?php
}
?>

</select>
</div>

<div id="form_theme">
<label for="new_theme">Créez un nouveau thème</label>
<input type="text" name="new_theme" id="new_theme" placeholder="Inscrivez votre thème ici"/>
<input type="submit" name="theme_submit" id="theme_submit" value="Envoyer" />
</div>

<div id="form_upload">
<label for="upload">Téléchargez vos images</label>
<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
<input type="file" name="upload[]" id="upload" multiple />
<input type="submit" name="upload_submit" id="upload_submit" value="Envoyer" />
<p>formats acceptés : jpeg, png, gif - taille maximum : 300Ko</p>

</div>

</form>

<?php require('partials/footer.php'); ?>

</div>
</body>
</html>