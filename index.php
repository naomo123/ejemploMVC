<?php
include_once 'core/Routing.php';
include_once 'core/config.php';
include_once 'Controllers/EditorialesController.php';
include_once 'Controllers/AutoresController.php';
include_once 'Controllers/LibrosController.php';
//echo $_SERVER['REQUEST_URI'];
$router=new Routing();
/*var_dump($router->url);
echo "Controlador: $router->controller";

echo "<br> metodo: $router->method";
echo "<br> parametro: $router->param";*/
$controller=$router->controller;
$method=$router->method;
$param=$router->param;
$controller=new $controller();
$controller->$method($param);

