<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';



try {

    $controllerFront = new \Projet\Controllers\FrontController();
    // if(empty($_SESSION))
    // {
    //     throw new Exception('Vous n\'êtes pas connecté', 401);
    // }
    
    if(isset($_GET['action']))
    {
        if($_GET['action']== 'about')
        { 
            $controllerFront->about(); //va chercher la fonction about() dans FrontController pour se rendre sur la page A propos
        }

        elseif($_GET['action'] == 'adoptions')
        {
            $controllerFront->adoptions(); //va chercher la fonction adoptions() dans FrontController pour se rendre sur la page Adoptions
        }

        elseif($_GET['action']== 'cats')
        {
            $controllerFront->cats(); //va chercher la fonction cats() dans FrontController pour se rendre sur la page Adoptions Chats
        }

        elseif($_GET['action']== 'dogs')
        {
            $controllerFront->dogs(); //va chercher la fonction dogs() dans FrontController pour se rendre sur la page Adoptions Chiens
        }

        elseif($_GET['action']== 'eachAnimal')
        {
            $id = htmlspecialchars($_GET['id']);
            $controllerFront->eachAnimal($id); //va chercher la fonction eachAnimal() dans FrontController pour se rendre sur la page de chaque animal
        }

        elseif($_GET['action']== 'blog')
        {
            $controllerFront->blog(); //va chercher la fonction blog() dans FrontController pour se rendre sur la page Blog
        }

        elseif($_GET['action']== 'eachArticle')
        {
            $id = htmlspecialchars($_GET['id']); 
            $controllerFront->eachArticle($id); //va chercher la fonction eachArticle() dans FrontController pour se rendre sur la page de chaque article
        }

        elseif($_GET['action'] == 'writeComment')
        {
            $data = [
                'idUser' => htmlspecialchars($_GET['user_id']) ,
                'idArticle' => htmlspecialchars($_GET['article_id']) ,
                'content' => htmlspecialchars($_POST['comment']),
            ];

            $controllerFront->writeComment($data); //va chercher la fonction writeComment() dans FrontController pour se rendre sur la page de chaque article et pouvoir écrire un commentaire
        }

        elseif($_GET['action']== 'contact')
        {
            $controllerFront->contact(); //va chercher la fonction contact() dans FrontController pour se rendre sur la page Contact
        }

        elseif($_GET['action']== 'connexion')
        {
            $controllerFront->connexion(); //va chercher la fonction connexion() dans FrontController pour se rendre sur la page Connexion à son compte
        }

        elseif($_GET['action']== 'dashboardUser')
        {
            if(empty($_SESSION))
            {
                throw new Exception('Vous n\'êtes pas connecté', 401);
            }
            $id = htmlspecialchars($_GET['id']);
            $controllerFront->dashboardUser($id); //va chercher la fonction dashboardUser() dans FrontController pour que chaque personne connectée à son compte puisse aller sur son espace perso
        }

        elseif($_GET['action'] == 'deleteComment')
        {
            $id = htmlspecialchars($_GET['id']);
            $controllerFront->deleteComment($id); //va chercher la fonction deleteComment() dans FrontController pour que chaque personne connectée puisse supprimer ses commentaires
        }

        elseif($_GET['action']== 'createAccount')
        {
            $controllerFront->createAccount(); //va chercher la fonction createAccount() dans FrontController pour se rendre sur la page de création de compte
        }

        elseif($_GET['action']== 'legal')
        {
            $controllerFront->legal(); //va chercher la fonction legal() dans FrontController pour se rendre sur la page des mentions légales et copyright
        }

        elseif($_GET['action']== 'newAccount')
        { //
            $nickname = htmlspecialchars($_POST['nickname']);
            $mail = htmlspecialchars($_POST['email']);
            $pass = $_POST['password'];
            $passVerif = $_POST['password-verif'];
            if($pass == $passVerif){
                $password = password_hash($pass, PASSWORD_DEFAULT);
                
                if(!empty($nickname) && (!empty($mail) && (!empty($password)))){
                    $controllerFront->newAccount($nickname, $mail, $password);
    
                }
                else
                {
                    $error = '* Tous les champs doivent être remplis !';
                    $controllerFront->createAccount($error); //va chercher la fonction createAccount() dans FrontController pour envoyer les infos d'une personne dans la BDD pour la création d'un compte
                }
            }
            else
            {
                // header('Location: index.php?action=createAccount&error1=true' );
                $error = '* Vérifiez votre mot de passe !';
                $controllerFront->createAccount($error); // renvoi un message d'erreur si des éléments sont faux et ne peuvent être envoyés à la BDD
            }
        } 

        elseif($_GET['action'] == 'connect')
        {
            $mail = htmlspecialchars($_POST['email']);
            $pass = $_POST['password'];

            if (!empty($mail) && (!empty($pass))){
                $controllerFront->connectAll($mail, $pass); //va chercher la fonction connectAll() dans FrontController pour ouvrir son compte perso
            }
            else
            {
                $error = '* Tous les champs doivent être remplis !';
                $controllerFront->connexion($error); // renvoi un message d'erreur si l'email ou mot de passe sont faux
            }
        } 

        elseif($_GET['action'] == 'disconnect')
        {
            session_destroy(); // déconnecte l'utilisateur de son compte
            unset($_SESSION);
            // var_dump($_SESSION); die;
            header('Location:index.php');
        }

        elseif($_GET['action'] == 'contactForm')
        {
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $mail = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $objet = htmlspecialchars($_POST['object']);
            $content = htmlspecialchars($_POST['content']);

            if(!empty($lastname) && (!empty ($firstname) && (!empty($mail) && (!empty($phone) && (!empty($objet) && (!empty($content))))))){
                $controllerFront->contactPost($lastname, $firstname, $mail, $phone, $objet, $content); //va chercher la fonction contactPost() dans FrontController pour permettre l'envoi d'un message à l'admin par le biais du formulaire de contact
            } 
            else 
            {
                $error = '* Tous les champs doivent être remplis !';
                $controllerFront->contact($error); // renvoi un message d'erreur si tous les champs ne sont pas remplis dans le formulaire de contact
            }
        }      
    }
    else
    {
        $controllerFront->home(); // renvoi à la page d'accueil si aucune des actions ci-dessus n'a eu lieu
    }

}
catch (Exception $e)
{
    $error = $e->getMessage();
    require "app/Views/front/page404.php";
}
catch (Error $e)
{
    $error = $e->getMessage();
    require "app/Views/front/oops.php";
}