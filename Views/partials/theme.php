<?php 

	if(isset($letter))
	{

		foreach ($letter as $value)
		{
		?>
		<h2 class="letter">Lettre <?php echo $value;?></h2>
	<?php
		}
	}
	
	if (is_array($title_theme))
	{
	?>
	<div class="theme_h3">
	<?php
		foreach ($title_theme as $value)
		{
		?>
		
		<h3 class="title_theme"><a href="?id=<?php echo $_GET['id']; ?>&theme=<?php echo $value;?>"><?php echo $value; ?></a></h3>
		
	<?php
		}
		?>
		</div>
		<div class="miniatures_theme">
		<?php if (!empty($_GET['theme'])){
		?>
		<h2>Images du thème <?php echo $_GET['theme'];?></h2>
		<?php
		}
		if(isset($image_theme)){
		
		foreach($image_theme as $table){
			foreach ($table as $theme => $display){
			$url_image = substr($display, 0, -9);
	?>
			<a href="<?php echo IMAGES_REP_DIR_URL.$theme.'/'.$url_image.'.jpg'; ?>"target="_blank"><img src="<?php echo THUMBNAIL_DIR_URL.$theme.'/'.$display ; ?>" alt="" /></a>
			<?php
			}
		}
	}
	?>
		 
		
		</div>
		<?php
		
		
	}

	?>
		