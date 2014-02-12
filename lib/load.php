<?php

require __DIR__ . '/Controller.php';
require str_replace('\lib', "", __DIR__) . '/controllers/appController.php';
 

$module = 'site';
$controller_name = 'home';
$action = 'index';
$require = 'controllers/' . $module . '/' . $controller_name;
$id = '';
if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {

    $route = $_SERVER['QUERY_STRING'];
    $route = explode('/', $route);

    if (isset($route[2])) {
        $action = $route[2];
    }

    if (isset($route[3])) {
        $id = $route[3];
    }


    $controller_name = $route[1];
    $require = 'controllers/' . $route[0] . '/' . $route[1];
}
 
require_once $require . '.php';

// call action 
$controller_name = ucfirst($controller_name);
$controller = new $controller_name();
$controller->$action($id);
?>

