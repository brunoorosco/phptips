<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\User;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../../theme","php");
    }
    public function home($data){
       $users = (new User())->find()->fetch(true);
       echo $this->view->render("home",[
           "title" => "home | ". SITE,
           "users" => $users
       ]);
    }
    public function contato($data){
        echo "<h1>Contato</h1>";
        //var_dump($data);
        $url = URL_BASE;
        require __DIR__."../../Views/contato.php";
    }
    public function error($data){
        echo "<h1>Erro{$data["errcode"]}</h1>";
       // var_dump($data);
    }
}