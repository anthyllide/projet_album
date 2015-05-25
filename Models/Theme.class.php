<?php 
require_once ('C:/wamp/www/projet_album/Models/Bdd.class.php');

class Theme {

	public function __construct (){
	}
	
	//Affichage du menu lettres
	public function menuLetter (){
	
	$bdd = new Bdd;
	
	$req = $bdd -> query('SELECT * FROM menu');
	
		while($donnees = $req -> fetch())
		{
		
		$menu[] = $donnees['lettre'];
		
		}
		
			if(empty($menu))
			{
			return false;
			}
			else
			{
			return $menu;
			}
			
	$req -> CloseCursor();
		
	}

	//Affichage des th�mes dans pages accueil
	public function displayTheme ($id) {
	
	$bdd = new Bdd;
	
	$req = $bdd -> prepare('
	SELECT f.theme nom_theme
	FROM folders f
	INNER JOIN menu m
	ON f.lettre = m.lettre
	WHERE m.IDmenu = ?
	ORDER BY nom_theme
	');
	
	$req -> execute (array($id));
	
		while ($donnees = $req -> fetch())
		{
		$title_theme[] = $donnees['nom_theme'];
		}
		
		if (isset ($title_theme))
		{
		return $title_theme;
		}
		else
		{
		return false;
		}
		
}
	
	
	//Affichage des themes dans menu d�roulant
	public function selectTheme () {
	
	$bdd = new Bdd;
	
	$req = $bdd -> query('SELECT theme FROM folders ORDER BY theme');

	
		while($donnees = $req -> fetch())
		{
		
		$select[] = $donnees['theme'];
		
		}
		
			if(empty($select))
			{
			return false;
			}
			else
			{
			return $select;
			}
			
	$req -> CloseCursor();
	
	}
	
	public function selectLetter ($id){
	
	$bdd = new Bdd;
	
	$req = $bdd -> prepare('SELECT lettre from menu WHERE IDmenu=?');
	
	$req -> execute(array($id));
	
	$donnees = $req ->fetch();
	
	if(!empty($donnees))
	{
	$letter [] = $donnees['lettre'];
	return $letter;
	}
	else
	{
	return false;
	}
		
}

	
	// insertion nouveau theme dans bdd
	public function createTheme ($new_theme) {
	
	$first_letter = substr($new_theme,0);
	
	$bdd = new Bdd;
	
	$select_theme = $this -> selectTheme();
	
	if($select_theme !== false){
	
		if (!in_array($new_theme,$select_theme))
		{
	
		$rep = $bdd -> prepare('INSERT INTO folders (theme, lettre) VALUES (:new_theme, :first_letter)');
	
		$rep -> execute (array(
					'new_theme' => $new_theme,
					'first_letter' => $first_letter
					));
	
			if ($rep == true) {
			return true;
			}
			else
			{
			$msg_error ='Le nouveau thème n\'a pas pu être enregistré';
			return $msg_error;
			}
	
		$rep -> CloseCursor();
		
		}
		else
		{
		$msg_error ='Ce theme existe déjà.';
		return $msg_error;
		}
	}
	else
	{
	$msg_error ='Une erreur s\'est produite lors de la récupération des thèmes dans le BDD.';
	return $msg_error;
	}
	
	}

}