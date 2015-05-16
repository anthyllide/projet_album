<?php

if (!empty($_POST ['new_theme'])) //si $_POST n'est pas vide
{
$_SESSION['sauvegarde'] = $_POST['new_theme']; // sauvegarde de $_POST dans une session
header('location:upload.php');  // puis redirection 
exit;
}

if (isset($_SESSION['sauvegarde'])) // si la session sauvegarde existe
{
$_POST ['new_theme'] = $_SESSION['sauvegarde']; // récupération du $_POST
unset ($_SESSION['sauvegarde']); //destruction de la session
}