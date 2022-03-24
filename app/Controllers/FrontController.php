<?php

namespace Projet\Controllers;

class FrontController extends Controller{

    //pour se rendre sur la page d'accueil
    public function home(){ 
        return $this->view('home');
    }

    //pour se rendre sur la page A propos
    public function about(){ 
        return $this->view('about');
    }

    //pour se rendre sur la page de présentation des chats à l'adoption
    function cats(){
        return $this->view('cats');
    }

    //pour se rendre sur la page de présentation des chiens à l'adoption
    function dogs(){
        return $this->view('dogs');
    }

    //pour se rendre sur la page blog
    function blog(){ 
        return $this->view('blog');
    }

    //pour se rendre sur la page contact "
    function contact($error = null){ 
        return $this->view('contact', $error);
    }

    //pour se rendre sur la page connexion
    function connexion($error = null){
        return $this->view('connexion', $error);
    }

    //pour se rendre sur la page createAccount
    public function createAccount($error = null){
        return $this->view('createAccount', $error);
    }

    //pour se rendre sur la page des mentions légales
    function legal(){
        return $this->view('legal');
    }

    //pour créer son nouvel espace User
    function newAccount($nickname, $mail, $password){
        $newUser = new \Projet\Models\UserModel();
        $newUser->newAccount($nickname, $mail, $password);
        $this->home();
    }

    //pour accéder à son espace user
    function userConnect($mail, $pass){
        $user = new \Projet\Models\UserModel();
        $connexUser = $user->passCheck($mail);

        $result = $connexUser->fetch();

        $correctPassword = password_verify($pass, $result['password']);

        if($correctPassword){
            $_SESSION['mail'] = $result['mail'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['nickname'] = $result['nickname'];

            return $this->view('home');
        }else{
            $error = '*Vos identifiants sont incorrects';
            return $this->view('connexion', $error);
        }
    }

    //pour envoyer un mail depuis le formulaire de contact
    function contactPost($lastname, $firstname, $mail, $phone, $objet, $content){
        $postMail = new \Projet\Models\ContactModel();
        $mailPost = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet, $content);

        return $this->view('contact');
    }

    

    
}