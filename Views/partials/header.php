<header>
<div id="logo">
<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/'.WEB_DIR_NAME.'/index.php'; ?>"><img src="<?php echo IMAGES_DIR_URL.'/logo.jpg'; ?>" alt="logo" /></a>
</div>

<h1><span>A</span>lbum photos</h1>

<div class="clear"></div>

<div id="login">
<?php 
if (isset($_SESSION['user_login']))
{
?>
<p>Bonjour, <?php echo $_SESSION['user_login'];?></p>
<p><a href="<?php echo WEB_DIR_URL.'Views/upload.php'; ?>">Admin</a></p>
<p><a href="<?php echo WEB_DIR_URL.'Views/logout.php'; ?>">Déconnexion</a></p>
<?php
}
else
{
?>
<p>Non connecté</p>
<p><a href="<?php echo WEB_DIR_URL.'Views/login.php'; ?>">Connexion</a></p>
<?php
}
?>
</div>
</header>