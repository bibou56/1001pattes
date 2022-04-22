<?php

namespace Projet\Controllers;

class FrontController extends Controller{

    //pour se rendre sur la page d'accueil
    public function home()
    { 
        $countCats = new \Projet\Models\UserModel();
        $catCount = $countCats->countCats();

        $countDogs = new \Projet\Models\UserModel();
        $dogCount = $countDogs->countDogs();

        $userManager = new \Projet\Models\UserModel();
        $findEvent = $userManager->findEvent();
        $resultEvent = $findEvent->fetch();

        require $this->view('home');
    }

    //affiche la page A propos et ses éléments
    public function about()
    { 
        $userManager = new \Projet\Models\UserModel();
        $teamMembers = $userManager->findTeam();

        $resultTeam = $teamMembers->fetchAll();

        require $this->view('about');
    }

    public function adoptions()
    {
        $userManager = new \Projet\Models\AnimalModel();
        $types = $userManager->getTypes();
        $result = $types->fetchAll();
        require $this->view('adoptions');
    }

    //pour se rendre sur la page de présentation des chats à l'adoption
    function cats()
    {
        $cats = new \Projet\Models\UserModel();
        $result = $cats->allCats();

        $allCats = $result->fetchAll();

        require $this->view('cats');
    }

    //pour se rendre sur la page de présentation des chiens à l'adoption
    function dogs()
    {
        $dogs = new \Projet\Models\UserModel();
        $result = $dogs->allDogs();

        $allDogs = $result->fetchAll();
        
        require $this->view('dogs');
    }

    function eachAnimal($id)
    {
        $eachAnimal = new \Projet\Models\UserModel();
        $result = $eachAnimal->oneAnimal($id);

        $oneAnimal = $result->fetch();

        require $this->view('eachAnimal');
    }

    //pour se rendre sur la page blog
    function blog()
    { 
        $blog = new \Projet\Models\UserModel();
        $result = $blog->allArticles();

        $allArticles = $result->fetchAll();

        require $this->view('blog');
    }

    function eachArticle($id)
    {
        $eachArticle = new \Projet\Models\UserModel();
        $result = $eachArticle->oneArticle($id);
        $oneArticle = $result->fetch();
        $result2 = $eachArticle->allComments($id);
        $comments = $result2->fetchAll();

        require $this->view('eachArticle');
    }

    function writeComment($data)
    {
        $comment = new \Projet\Models\UserModel();
        $result = $comment->createComment($data);

        $this->eachArticle($data['idArticle']);
    }

    //pour se rendre sur la page contact "
    function contact($error = null){ 
        require $this->view('contact', $error);
    }

    //pour se rendre sur la page connexion
    function connexion($error = null){ 
            require $this->view('connexion', $error);
    }

    function dashboardUser($id)
    {
        $userComments = new \Projet\Models\UserModel();
        
        $result = $userComments->userAllComments($id);
        
        $userAllComments = $result->fetchAll();
        
        require $this->view('dashboardUser');
    }

    function deleteComment($id)
    {
        $userComments = new \Projet\Models\UserModel();
        $deleteComment = $userComments->commentDelete($id);

        header('Location:index.php?action=dashboardUser&id='. $_SESSION['id']);
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
        require $this->connexion();
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
            // require $this->viewAdmin('dashboardAdmin');
            header('Location:indexAdmin.php?action=dashboardAdmin&id='. $_SESSION['id']);
        }
        elseif($correctPassword && $_SESSION['role'] === 0)
        {
            header('Location:index.php?action=dashboardUser&id='. $_SESSION['id']);
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