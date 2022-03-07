<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $controllerFront = new \Projet\Controllers\FrontController();

    if(isset($_GET['action'])){
        if($_GET['action']== 'about'){ 
            $controllerFront->about(); //va chercher la fonction about() dans FrontController pour se rendre sur la page A propos
        }
        elseif($_GET['action']== 'cats'){
            $controllerFront->cats(); //va chercher la fonction cats() dans FrontController pour se rendre sur la page Adoptions Chats
        }
        elseif($_GET['action']== 'dogs'){
            $controllerFront->dogs(); //va chercher la fonction dogs() dans FrontController pour se rendre sur la page Adoptions Chiens
        }
        elseif($_GET['action']== 'blog'){
            $controllerFront->blog(); //va chercher la fonction blog() dans FrontController pour se rendre sur la page Blog
        }
        elseif($_GET['action']== 'contact'){
            $controllerFront->contact(); //va chercher la fonction contact() dans FrontController pour se rendre sur la page Contact
        }
        elseif($_GET['action']== 'connexion'){
            $controllerFront->connexion(); //va chercher la fonction connexion() dans FrontController pour se rendre sur la page Connexion
        }






    }
    else{
        $controllerFront->home();
    }
}
catch (Exception $e){
    require "app/Views/front/error.php";
}