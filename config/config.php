<?php

define('DEFAULT_CONTROLLER', 'home');
$IMAGE_DIR = str_replace('config', "", __DIR__) . 'uploads/';
define('IMAGE_DIR', $IMAGE_DIR);
  
require __DIR__ . '/database.php';

 

require_once(str_replace('config', "", __DIR__)  . 'lib/PHPImageWorkshop/ImageWorkshop.php'); // Be sure of the path to the class
require_once(str_replace('config', "", __DIR__) . 'lib/autoload.php');
?>
 