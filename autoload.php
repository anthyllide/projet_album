<?php
function chargerclass ($classe){

require_once('Models/'.$classe.'.class.php');

}

spl_autoload_register('chargerclass');
