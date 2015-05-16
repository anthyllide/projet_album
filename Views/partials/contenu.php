<article>

<h2>Dernières images téléchargées</h2>

<div id=miniatures>
<?php
print_r ($images);

if(isset ($images)){
	foreach ($images as $id => $value)
	{
	?>
	<img src="<?php echo $value?>" alt="" />
	<?php
	}
}
	?>
</div>


</article>