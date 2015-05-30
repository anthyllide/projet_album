<?php

$user = new User();
?>

<!DOCTYPE html>
<html lang='fr'>

<head>
<meta charset='UTF-8'/>
</head>

<body>
<?php


if (empty($_SESSION['user_login']))
{
echo 'Cette page n\'existe pas.'
?>
<p>Pour revenir au site, cliquez sur le lien ci-après :<a href="../index.php">Retour au site</a></p>
<?php
exit;
}