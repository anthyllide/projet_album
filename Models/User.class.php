<?php
require_once ('C:/wamp/www/projet_album/Models/Bdd.class.php');

class User {

	public function __construct() {
	}
	
	
	// Fonction nombre de caractères max.
	public function lenght_control ($text,$limit1,$limit2){
	
	$text_lenght = strlen($text);
	
	if ($text_lenght > $limit1 AND $text_lenght <= $limit2)
	{
	return true;
	}
	else
	{
	return false;
	}
		
	}
	
	// Vérifie que la forme du mail est correct par une regex
	public function login_authorised ($login) {
	
	if (preg_match("#^[a-zA-Z0-9/./-]+@[a-zA-Z0-9]{2,}\.[a-z]{2,20}$#",$login))
	{
		return true;
	}
	else
	{
		return false;
	}
	}	
	
	//Vérifie la forme du mot de passe (caractères, longueur du mot de passe)
	public function password_authorised ($password){
	
	$password_lenght = strlen($password);
	
	$unauthorised_characters = array('<','>','/','//',"'",'"','$');
	
	$error_password = 0;
	
		for($i=0; $i<$password_lenght; $i++) {
		
			if(in_array($password[$i],$unauthorised_characters))
			{
			$error_password++;
			}
		}
		
		if($error_password >0){
		
		return false;
		}
		else
		{
		return true;
		}
	
	}
	
	//Vérifie que le login existe dans la table user et que le mot de passe associé est le même que celui stocké
	public function authUser ($login, $password){
	
	$salt = md5($login);
	$crypt_password = $salt.$password;
	$password = md5($crypt_password);

	$bdd = new Bdd;
	$bdd->exec("SET NAMES 'UTF8'");
		
	$rep = $bdd -> prepare('SELECT login, password FROM user WHERE login=?');
	$rep -> execute (array($login));
	
	$row = $rep -> fetch();
	
	//on vérifie si le login existe
	if (!isset($row['login'])){
	$msg_error = 'Le login n\'existe pas.';
	return $msg_error;
	}
	else 
	{

		// on vérifie que le mot de passe est correct
		if($row['password'] === $password)
		{
		$_SESSION['user_role'] = $row['role'];
		return true;
		}
		else
		{
		$msg_error ='Votre mot de passe est incorrect.';
		return $msg_error;
		}
		
	}
}
	
	
	// Création d'un nouveau utilisateur
	public function newUser ($login, $password){
	
	$login_authorised = $this -> login_authorised ($login);

	if ($login_authorised === true){
		
		$salt = md5($login);
	}
	else
	{
		$msg_error = 'Login non compatible';
		return $msg_error;
	}
	
	
	$password_authorised = $this -> password_authorised ($password);
	
	if ($password_authorised === true)
	{
		$password = $salt.$password;
		$password = md5($password);
	}
	else
	{
		$msg_error = 'mot de passe non compatible';
		return $msg_error;
	}
	
	$bdd = new Bdd;
	$bdd->exec("SET NAMES 'UTF8'");
		
	$rep = $bdd -> prepare('INSERT INTO user (login,password) VALUES (:login, :password)');
	
	$insert = $rep -> execute (array (
					'login' => $login,
					'password' => $password
					));
					
	if (!$insert){
	return false;
	}
	else
	{
	return true;
	}
	
}

	//Envoie d'un email avec un mot de passe provisoire, ici "nouveau"
	public function lostPassword ($mail){

	$bdd = new Bdd;
	$bdd->exec("SET NAMES 'UTF8'");
		
	$rep = $bdd -> prepare ('SELECT login, password FROM user WHERE login=?');
	$rep -> execute (array($mail));
	
	$row = $rep -> fetch();
	
	if (!isset($row ['login']))
	{
	$msg_error = 'Cet Email n\'existe pas.';
	return $msg_error;
	}
	else
	{
	$salt= md5($mail);
	$password = 'nouveau';
	$crypt_password = $salt.$password;
	$password = md5($crypt_password);
	
	$rep = $bdd -> prepare('UPDATE user SET password = :newpassword WHERE login=:mail');
	$rep -> execute(array(
					'newpassword' => $password,
					'mail' => $mail
	));
	
	if ($rep){
	
	$to = $mail;
	$subjet = 'Votre mot de passe';
	$message = 'Bonjour, le nouveau mot de passe est "nouveau".
	<a href=".WEB_DIR_URL./Views/login.php">Cliquez ici pour vous connecter.</a>';
	$headers = 'De monBlogImage.com';
	
	$send_mail = mail($to, $subjet, $message, $headers);
	
		if ($send_mail)
		{
		return true;
		}
		else
		{
		$msg_error ='Email non envoyé.';
		return $msg_error;
		}
	}
	
	}

}
	
}



