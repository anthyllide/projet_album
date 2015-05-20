<?php
require_once ('C:/wamp/www/projet_album/Models/Bdd.class.php');

class Image {

public function __construct() {
}

//Affichage des 10 dernières miniatures page accueil 
public function getImage (){

	$i=1;
	
	$bdd = new Bdd;
	
	$rep = $bdd -> query ('SELECT filenameTiny, theme FROM images ORDER BY IDimage DESC LIMIT 10'); 
	
	$count = $rep -> rowCount();// on compte le nombre de lignes
		
		if ($count > 0)
		{
			
			while ($donnees = $rep -> fetch())
			{
				
				$path = THUMBNAILS_REP_DIR_PATH.$donnees ['theme'].'/'.$donnees['filenameTiny'];
				
				if (!file_exists($path))
				{
					return false;
				}
				else
				{
				
				$images[$i] [$donnees ['theme']]  = $donnees['filenameTiny'];
				
				$i++;
				
		
				}
			}	
		return $images;					
			
		}
		else
		{
			return false ;
		}

}

//Affichage des images par thème
public function getImageByTheme ($theme) {
	
	$theme = strtolower($theme);
	
	$i=1;
	
	$bdd = new Bdd;
	
	$rep = $bdd -> prepare ('SELECT filenameTiny, theme FROM images WHERE theme = ? ORDER BY IDimage'); 
	
	$rep -> execute (array($theme));
	
			while ($donnees = $rep -> fetch())
			{
				
				$path = THUMBNAILS_REP_DIR_PATH.$theme.'/'.$donnees['filenameTiny'];
				
				if (!file_exists($path))
				{
					return false;
				}
				else
				{
				
				$images[$i][$donnees['theme']] = $donnees['filenameTiny'];
				
				$i++;
				
				}
			}	
		
		return $images;					
			
}




//on renomme les images
public function renameImage ($filename,$theme){

	$extension = '.jpg';
	
	$bdd = new Bdd;
	
	$rep = $bdd -> prepare ('SELECT COUNT(*) AS nb_images FROM images WHERE filename LIKE ? ');
	
	$rep -> execute (array($theme.'%'));
	
	$donnees = $rep -> fetch();
	
	$i = $donnees['nb_images'];
	
	$filename = strtolower($theme).'-image-'.($i+1).$extension;
	
	return $filename;
	
}

//on renomme les miniatures en ajoutant -tiny
public function renameThumbnail ($name){

	$extension = '.jpg';
	
	$name = basename ($name, $extension);
	
	$filename = $name.'-tiny'.$extension;
	
	return $filename;
}

//insertion images Bdd
public function insertImage ($name, $theme){

$filename_tiny = $this -> renameThumbnail ($name);

$bdd = new Bdd;

$rep = $bdd -> prepare ('INSERT INTO images (filename, filenameTiny, theme) VALUES (:filename,:filenametiny,:theme)');

$reponse = $rep -> execute (array(
				'filename' => $name,
				'filenametiny' => $filename_tiny,
				'theme' => $theme
				));
				
	if ($reponse === true)
	{
	return true;
	}
	else
	{
	return false;
	}

$rep -> CloseCursor();

}

			
//créations des images miniatures
public function createThumbnail ($filename, $theme){

		$name_vignette = $this -> renameThumbnail ($filename, $theme);

		$image = IMAGE_REP_DIR_PATH.$theme.'/'.$filename;
		$vignette = THUMBNAILS_REP_DIR_PATH.$theme.'/'.$name_vignette;
		
		$image_type = exif_imagetype($image);
 
		
		if($image_type == IMAGETYPE_JPEG)
		{
		$source = imagecreatefromjpeg ($image);
		}
		
		
		$largeur_source = imagesx($source);
		$hauteur_source = imagesy($source);
		
		$largeur_destination_max = 150;
		$hauteur_destination_max = 150;
		
		//on vérifie que l'image source ne soit pas plus petite que l'image de destination
		if ($largeur_source > $largeur_destination_max || $hauteur_source > $hauteur_destination_max)
		{
				//la plus grande des dimensions est la référence
				if($hauteur_source <= $largeur_source)
				{
					$ratio = $largeur_destination_max / $largeur_source; 
				}
				else
				{
					$ratio = $hauteur_destination_max / $hauteur_source; 
				}
		}
		else
		{
			$ratio = 1;
		}
		
		$destination = imagecreatetruecolor(round($largeur_source*$ratio),round($hauteur_source*$ratio));
		
		//création de la vignette
		
		imagecopyresampled ($destination, $source, 0, 0 , 0, 0, round($largeur_source*$ratio),round($hauteur_source*$ratio), $largeur_source, $hauteur_source);
		
		if($image_type == IMAGETYPE_JPEG)
		{
		imagejpeg($destination, $vignette);
		}
		
}

// upload des images dans le répertoires images du serveur, puis insertion dans la BDD

	public function upload($files,$theme)
	{
		
		foreach ($files ['tmp_name'] as $key => $tmp_name)
		{
		
		
		$name = $files ['name'][$key];
		
		$renameImage = $this -> renameImage($name,$theme);
		$name = $renameImage;
		
		$type = $files ['type'][$key];
		$error = $files ['error'][$key];
		
		$extension_autorisees = array (
									'jpg',
									'jpeg'
									);
									
		$extension = basename($type);
	
		
			if (in_array($extension, $extension_autorisees))
			{
			
				$images_size = getimagesize($tmp_name);
			
				if(($images_size[0] < MAX_WIDTH) OR ($images_size[1] < MAX_HEIGHT))
				{
					if ($error == 0) 
					{
					
						$upload_dir = IMAGE_REP_DIR_PATH.$theme.'/';
					
						//creation du répertoire theme s'il n'existe pas
						if(is_dir($upload_dir) === false){
						
						
						$createFolder = mkdir($upload_dir);
						
							if($createFolder === true){
							$upload_dir = $upload_dir = IMAGE_REP_DIR_PATH.$theme.'/';
							}
							else
							{
							$msg_error [$key] = 'L\'image n\'a pas pu être enregistrée.';
							}
						}
						
						
						$moveImage = move_uploaded_file ($tmp_name, $upload_dir.'/'.$name);
						
					
						if ($moveImage === true)
						{
							
								$thumb_dir = THUMBNAILS_REP_DIR_PATH.$theme.'/';
					
							//creation du répertoire theme s'il n'existe pas
							if(is_dir($thumb_dir) === false){
						
						
							$createFolder = mkdir($thumb_dir);
						
								if($createFolder === true){
							
								$this -> createThumbnail ($name,$theme);
								
								}
							}
							
							$this -> createThumbnail ($name,$theme);
						
						
							$insertImage = $this -> insertImage ($name, $theme);
						
							if ($insertImage === true)
							{						
							$msg_success = true;
							continue;
							}
							else
							{
							$msg_error [$key]= 'L\'image n\'a pas pu être enregistrée.';
							continue;
							}
						}
											
						else
						{
						$msg_error [$key] = 'L\'image n\'a pas pu être téléchargée.';
						continue;
						}
					
					}
					else
					{
					$msg_error [$key] = 'Une erreur s\'est produite lors du téléchargement.';
					continue;
					}
					
				}
				else
				{
				$msg_error [$key] = 'Les dimensions de l\'image sont trop grandes.';
				continue;
				}
			}
			else
			{
			$msg_error [$key] = 'Seules les images en .jpg sont acceptées.';
			continue;
			}
		
		}
		
		
		if((isset($msg_success)) AND (isset($msg_error)))
		{
		return $msg_error ; //tableau des différentes erreurs
		}
		
		elseif (isset($msg_success))
		{
		return true; //renvoie true 
		}
		
		elseif (isset ($msg_error))
		{
		return $msg_error; //tableau des différentes erreurs
		}
		
	}

}