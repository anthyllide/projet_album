<?php 
session_start();
require_once('../config.php');
require ('../autoload_2.php');
require('../Controllers/process_auth.php');
require('../Controllers/process_account.php');

?>

<!DOCTYPE html>
<html lang='fr'>

<head>
<meta charset='UTF-8'/>
<title><?php echo WEB_TITLE.'- login';?></title>
<link rel="stylesheet" href="css/style.css" media="screen" />
</head>

<body>

<?php
if (isset ($msg_error))
{
?>
<div id="msg_error">
<p class="msg_error"><?php echo $msg_error; ?></p>
</div>
<?php
}
?>

<?php
if (isset ($msg_success))
{
?>
<div class="msg_success">
<p id="msg_sucess"><?php echo $msg_success; ?></p>
</div>
<?php
}
?>
<div id="wrapper">

<p id="lien_login"><a href="../index.php">Retour site</a></p>

<h1 id="h1_login">Identifiez-vous</h1>

<div id="user_login">

<h2>Déjà inscrit</h2>

<form action="" method="post">
<p><label for="user_login">Votre email</label>
<input type="text" placeholder="votre email" name="user_input_login" id="user_login" />
</p>

<p><label for="password1">Votre mot de passe</label>
<input onpaste="return false" oncopy="return false" type="password" name="user_input_password" id="password1" />
</p>

<p><input type="submit" name="submit_form" id="user_submit"/></p>

</form>
<p><a href="lost_password.php">Mot de passe oublié ?</a></p>

</div>

<div id="registration_user_login">

<h2>Nouveau utilisateur</h2>

<form action="" method="post">
<p><label for="registration_login">Votre email</label>
<input type="text" onpaste="return false" oncopy="return false" placeholder="votre email" name="registration_login" id="registration_login" />
</p>

<p><label for="registration_password">Votre mot de passe</label>
<input type="password" onpaste="return false" oncopy="return false" name="registration_user_password" id="registration_password" />
</p>

<p>
<input type="password" onpaste="return false" oncopy="return false" placeholder="confirmez votre mot de passe" name="registration_confirm_password" id="password2" />
</p>

<p><input type="submit" name="submit_form" id="registration_submit" /></p>

</form>

</div>

<div class="clear"></div>

<?php require_once ('partials/footer.php'); ?>
</div>

</body>
</html>
