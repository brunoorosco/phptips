<?php

require __DIR__."/vendor/autoload.php";

 use CoffeeCode\Router\Router;

 $router = new Router(URL_BASE);

 $router->group(null);
 $router->get('/', function($data){
    echo "<h1>Home!</h1>";
 });
 
 $router->get('/contato', function($data){
    echo "<h1>Contato!</h1>";
 });
 
 $router->group("ops");
 $router->get('/{errcode}', function($data){
    echo "<h1>Erro{$data["errcode"]}</h1>";
 });


$router->dispatch();

if($router->error()){
  $router->redirect("/ops/{$router->error()}");
}