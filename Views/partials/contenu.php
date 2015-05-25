<article>

<h2>Dernières images téléchargées</h2>

<div id=miniatures>
<?php

if (isset($images)){
	
	foreach($images as $id => $value){
		
		foreach ($value as $theme => $image){
			
		$url_image = substr($image, 0, -9);
			
	?>
	
		<a href="<?php echo IMAGES_REP_DIR_URL.$theme.'/'.$url_image.'.jpg'; ?>" target="_blank"><img src="<?php echo THUMBNAIL_DIR_URL.$theme.'/'.$image ; ?>" alt="" /></a>
	<?php
		}
	}	
}

	
?>
</div>


</article>