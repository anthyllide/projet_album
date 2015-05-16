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
		<h3><?php echo $value; ?></h3>
		<div id=miniatures>
		<img src="images/fotolia_01.jpg" alt="" />
		</div>
		<?php
		}
		
	}

	?>
		