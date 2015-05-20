<?php 

	if(isset($letter))
	{

		foreach ($letter as $value)
		{
		?>
		<h2 id="letter">Lettre <?php echo $value;?></h2>
	<?php
		}
	}
	
	if (is_array($title_theme))
	{
		foreach ($title_theme as $value)
		{
		?>
		<h3><a href="?id=<?php echo $_GET['id']; ?>&theme=<?php echo $value;?>"><?php echo $value; ?></a></h3>
		
		<div id=miniatures>
	<?php
	
		if(isset($image_theme)){
		
		foreach($image_theme as $table){
			foreach ($table as $theme => $display){
	?>
			<img src="<?php echo 'http://'.THUMBNAIL_DIR_URL.$theme.'/'.$display ; ?>" alt="" />
			<?php
			}
		}
	}
	?>
		 
		
		</div>
		<?php
		}
		
	}

	?>
		