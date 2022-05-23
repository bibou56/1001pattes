<?php

namespace Projet\Controllers;

class FrontController extends Controller{

    //affichage de la page d'accueil
    public function home()
    { 
        $countCats = new \Projet\Models\UserModel();
        $catCount = $countCats->countCats(); //permet de compter le nombre de chats à l'adoption

        $countDogs = new \Projet\Models\UserModel();
        $dogCount = $countDogs->countDogs(); //permet de compter le nombre de chiens à l'adoption

        $userManager = new \Projet\Models\UserModel();
        $findEvent = $userManager->findEvent();
        $resultEvent = $findEvent->fetch(); //permet d'aller récupérer les données d'un évènement créé

        $pets = new \Projet\Models\UserModel();
        $result = $pets->lastPets();
        $lastPets = $result->fetchAll(); //permet de récupérer les données des derniers animaux arrivés au refuge

        require $this->view('home');
    }

    //affiche la page A propos et ses éléments
    public function about()
    { 
        $userManager = new \Projet\Models\UserModel();
        $teamMembers = $userManager->findTeam();

        $resultTeam = $teamMembers->fetchAll(); //permet de récupérer les données afin d'afficher les membres de l'équipe créés

        require $this->view('about');
    }

    //affiche la page Adoptions
    public function adoptions()
    {
        $userManager = new \Projet\Models\AnimalModel();
        $types = $userManager->getTypes(); //permet de sélectionner le type d'animal (chats ou chiens)
        $result = $types->fetchAll();
        require $this->view('adoptions');
    }

    //pour se rendre sur la page de présentation des chats à l'adoption
    function cats()
    {
        $cats = new \Projet\Models\UserModel();
        $result = $cats->allCats();

        $allCats = $result->fetchAll(); //permet d'afficher tous les chats créés dans la BDD

        require $this->view('cats');
    }

    //pour se rendre sur la page de présentation des chiens à l'adoption
    function dogs()
    {
        $dogs = new \Projet\Models\UserModel();
        $result = $dogs->allDogs();

        $allDogs = $result->fetchAll(); //permet d'afficher tous les chiens créés dans la BDD
        
        require $this->view('dogs');
    }

    //pour se rendre sur les pages de présentation individuelle de chaque animal
    function eachAnimal($id)
    {
        $eachAnimal = new \Projet\Models\UserModel();
        $result = $eachAnimal->oneAnimal($id);

        $oneAnimal = $result->fetch(); //permet de récupérer les infos de chaque animal créé pour les afficher dans une page individualisée

        require $this->view('eachAnimal');
    }

    //pour se rendre sur la page blog
    function blog()
    { 
        $blog = new \Projet\Models\UserModel();
        $result = $blog->allArticles();

        $allArticles = $result->fetchAll(); //permet de récupérer les données des articles pour afficher toutes les cartes article sur la page Blog

        require $this->view('blog');
    }

    //pour se rendre sur les pages des chaque article
    function eachArticle($id)
    {
        $eachArticle = new \Projet\Models\UserModel();
        $result = $eachArticle->oneArticle($id);
        $oneArticle = $result->fetch(); //permet de récupérer les données d'un article en particulier afin de'lafficher dans une page individualisée
        $result2 = $eachArticle->allComments($id);
        $comments = $result2->fetchAll(); //permet d'afficher les commentaires liés à cet article

        require $this->view('eachArticle');
    }

    //permet d'écrire un commentaire si utilisateur connecté
    function writeComment($data)
    {
        $comment = new \Projet\Models\UserModel();
        $result = $comment->createComment($data); //permet d'envoyer dans la BDD les infos de création d'un commentaire

        $this->eachArticle($data['idArticle']);
    }

    //pour se rendre sur la page contact
    function contact($error = null)
    { 
        require $this->view('contact', $error);
    }

    //pour se rendre sur la page connexion
    function connexion($error = null)
    { 
            require $this->view('connexion', $error);
    }

    //pour que l'utilisateur connecté puisse se rendre sur son espace perso
    function dashboardUser($id)
    {
        $userComments = new \Projet\Models\UserModel();
        
        $result = $userComments->userAllComments($id);
        
        $userAllComments = $result->fetchAll(); // permet de récupérer les données de tous les commentaires écrits par l'abonné pour les afficher dans son espace perso
        
        require $this->view('dashboardUser');
    }

    //pour effacer ses commentaires
    function deleteComment($id)
    {
        $userComments = new \Projet\Models\UserModel();
        $deleteComment = $userComments->commentDelete($id); //efface de la BDD tous les éléments liés au commentaire

        header('Location:index.php?action=dashboardUser&id='. $_SESSION['id']);
    }

    //pour se rendre sur la page createAccount
    public function createAccount($error = null)
    {
        require $this->view('createAccount', $error);
    }

    //pour se rendre sur la page des mentions légales
    function legal()
    {
        require $this->view('legal');
    }

    //pour créer son nouvel espace User
    function newAccount($nickname, $mail, $password)
    {
        $newUser = new \Projet\Models\UserModel();
        $newUser->newAccount($nickname, $mail, $password); //envoi dans la BDD les infos nécessaires à la création d'un compte
        require $this->connexion();
    }

    //pour accéder à son espace user
    function connectAll($mail, $pass)
    {
        $user = new \Projet\Models\UserModel();
        $connexUser = $user->mailCheck($mail); 

        $result = $connexUser->fetch(); //vérifie si l'adresse mail est connue

        if(!empty($result))
        {
            $correctPassword = password_verify($pass, $result['password']);

                $_SESSION['mail'] = $result['mail'];
                $_SESSION['password'] = $result['password'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['nickname'] = $result['nickname'];
                $_SESSION['role'] = $result['role'];

            if($correctPassword && $_SESSION['role'] === 1)
            {
                header('Location:indexAdmin.php?action=dashboardAdmin&id='. $_SESSION['id']); //si le rôle de l'utilisateur est 1, il est connecté en tant qu'admin et renvoyé sur cet espace
            }
            elseif($correctPassword && $_SESSION['role'] === 0)
            {
                header('Location:index.php?action=dashboardUser&id='. $_SESSION['id']); //si le rôle de l'uitlisateur est 0, il est un utilisateur normal et est connecté à son accès perso
            }
            else
            {
                $error = '*Vos identifiants sont incorrects';
                require $this->view('connexion', $error); //renvoi un message d'erreur si l'email ou mot de passe sont faux
            }
        }
        else
        {
            $error = '*Cette adresse email n\'est pas reconnue';
            require $this->view('connexion', $error); //renvoi un message d'erreur si l'email n'est pas reconnu
        }
    }

    //pour envoyer un mail depuis le formulaire de contact
    function contactPost($lastname, $firstname, $mail, $phone, $objet, $content)
    {
        $postMail = new \Projet\Models\UserModel();
        $mailPost = $postMail->postMail($lastname, $firstname, $mail, $phone, $objet, $content); //envoi dans le BDD toutes les infos remplis dans le formulaire de contact

        require $this->view('contact');
    }
}