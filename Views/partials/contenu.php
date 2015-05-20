<article>

<h2>Dernières images téléchargées</h2>

<div id=miniatures>
<?php

if (isset($images)){
	
	foreach($images as $id => $value){
		
		foreach ($value as $theme => $image){
			
		
			
	?>
	
		<img src="<?php echo 'http://'.THUMBNAIL_DIR_URL.$theme.'/'.$image ; ?>" alt="" />
	<?php
		}
	}	
}

	
?>
</div>


</article>