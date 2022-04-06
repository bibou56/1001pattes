<?php

namespace Projet\Controllers;

class FrontController extends Controller{

    //pour se rendre sur la page d'accueil
    public function home(){ 
        require $this->view('home');
    }

    //pour se rendre sur la page A propos
    public function about(){ 
        require $this->view('about');
    }

    //pour se rendre sur la page de présentation des chats à l'adoption
    function cats(){
        $cats = new \Projet\Models\UserModel();
        $result = $cats->allCats();

        $allCats = $result->fetchAll();

        require $this->view('cats');
    }

    //pour se rendre sur la page de présentation des chiens à l'adoption
    function dogs(){
        require $this->view('dogs');
    }

    //pour se rendre sur la page blog
    function blog(){ 
        require $this->view('blog');
    }

    //pour se rendre sur la page contact "
    function contact($error = null){ 
        require $this->view('contact', $error);
    }

    //pour se rendre sur la page connexion
    function connexion($error = null){
        require $this->view('connexion', $error);
    }

    function dashboardUser(){
        require $this->view('dashboardUser');
    }

    //pour se rendre sur la page createAccount
    public function createAccount($error = null){
        require $this->view('createAccount', $error);
    }

    //pour se rendre sur la page des mentions légales
    function legal(){
        require $this->view('legal');
    }

    //pour créer son nouvel espace User
    function newAccount($nickname, $mail, $password){
        $newUser = new \Projet\Models\UserModel();
        $newUser->newAccount($nickname, $mail, $password);
        require $this->home();
    }

    //pour accéder à son espace user
    function connectAll($mail, $pass){
        $user = new \Projet\Models\UserModel();
        $connexUser = $user->mailCheck($mail);

        $result = $connexUser->fetch();

        $correctPassword = password_verify($pass, $result['password']);

            $_SESSION['mail'] = $result['mail'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['nickname'] = $result['nickname'];
            $_SESSION['role'] = $result['role'];

        if($correctPassword && $_SESSION['role'] === 1)
        {
            require $this->viewAdmin('dashboard');
        }
        elseif($correctPassword && $_SESSION['role'] === 0)
        {
            require $this->view('dashboardUser');
        }
        else
        {
            $error = '*Vos identifiants sont incorrects';
            require $this->view('connexion', $error);
        }
    }

    //pour envoyer un mail depuis le formulaire de contact
    function contactPost($lastname, $firstname, $mail, $phone, $objet, $content){
        $postMail = new \Projet\Models\ContactModel();
        $mailPost = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet, $content);

        require $this->view('contact');
    }

    

    
}