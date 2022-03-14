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
        elseif($_GET['action']== 'createAccount'){
            $controllerFront->createAccount(); //va chercher la fonction createAccount() dans FrontController pour se rendre sur la page createAccount
        }
        elseif($_GET['action']== 'newAccount'){ //
            $nickname = htmlspecialchars($_POST['nickname']);
            $mail = htmlspecialchars($_POST['email']);
            $pass = $_POST['password'];
            $passVerif = $_POST['password-verif'];
            if($pass === $passVerif){
                $password = password_hash($pass, PASSWORD_DEFAULT);
                
                if(!empty($nickname) && (!empty($mail) && (!empty($password)))){
                    $controllerFront->newAccount($nickname, $mail, $password);
    
                }else{
                    $error = '* Tous les champs doivent être remplis !';
                    $controllerFront->createAccount($error);
                }
            }else{
                // header('Location: index.php?action=createAccount&error1=true' );
                $error = '* Vérifier votre mot de passe !';
                $controllerFront->createAccount($error);
            }


        }        
    }
    else{

        $controllerFront->home();
    }

}catch (Exception $e){
    require "app/Views/front/error.php";
}