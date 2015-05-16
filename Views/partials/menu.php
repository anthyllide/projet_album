<?php 
$theme4 = new Theme;

$menu = $theme4 -> menuLetter ();

if ($menu !== false)
{
?>
<nav>
<ul>
<?php
	foreach($menu as $IDmenu => $value)
	{
	?>
	<li><a href="index.php?id=<?php echo $IDmenu+1;?>"><?php echo $value;?></a></li>
	<?php
	}
	?>
	</ul>
	</nav>
	<?php
}

?>
