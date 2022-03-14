<?php

namespace Projet\Controllers;

class FrontController{

    //pour se rendre sur la page d'accueil
    function home(){ 
        require "app/Views/front/home.php";
    }

    //pour se rendre sur la page A propos
    function about(){ 
        require "app/Views/front/about.php";
    }

    //pour se rendre sur la page de présentation des chats à l'adoption
    function cats(){
        require "app/Views/front/cats.php";
    }

    //pour se rendre sur la page de présentation des chiens à l'adoption
    function dogs(){
        require "app/Views/front/dogs.php";
    }

    //pour se rendre sur la page blog
    function blog(){ 
        require "app/Views/front/blog.php";
    }

    //pour se rendre sur la page contact
    function contact(){ 
        require "app/Views/front/contact.php";
    }

    //pour se rendre sur la page connexion
    function connexion(){
        require "app/Views/front/connexion.php";
    }

    //pour se rendre sur la page createAccount
    function createAccount($error = ''){
        require "app/Views/front/createAccount.php";
    }

    //pour accèder à son espace User
    function newAccount($nickname, $mail, $password){
        $user = new \Projet\Models\UserModel();
        $user->newAccount($nickname, $mail, $password);
        $this->home();
    }

    

    
}