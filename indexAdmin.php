<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try
{
    $controllerAdmin = new \Projet\Controllers\AdminController();
    $controllerAnimal = new \Projet\Controllers\AnimalController();
    $controllerBlog = new \Projet\Controllers\BlogController();

    if(empty($_SESSION))
    {
        throw new Exception('Vous n\'êtes pas connecté', 401);
    }
    
    if(isset($_GET['action']))
    { 
        if($_GET['action'] == 'dashboardAdmin')
        {
            $id = $_GET['id'];
            $controllerAdmin->dashboardAdmin($id); //va chercher la fonction dashboardAdmin() dans AdminController pour se rendre sur la page de gestion admin
        }

        elseif($_GET['action'] == "eachMail")
        {
            $id = $_GET['id'];
            $controllerAdmin->eachMail($id); //va chercher la fonction eachMail() dans AdminController pour que l'admin puisse voir chaque mail reçu
        }

        elseif($_GET['action'] == 'deleteMail')
        {
            $id = $_GET['id'];
            $controllerAdmin->deleteMail($id); //va chercher la fonction deleteMail() dans AdminController pour que l'admin puisse supprimer un mail reçu
        }

        elseif($_GET['action'] == 'deleteUser')
        {
            $id = $_GET['id'];
            $controllerAdmin->deleteUser($id); //va chercher la fonction deleteUser() dans AdminController pour que l'admin puisse supprimer un abonné
        }

        elseif($_GET['action'] == "disconnectAdmin")
        {
            session_destroy(); // déconnecte l'admin de son compte
            header('Location:indexAdmin.php');
        }

        elseif($_GET['action'] == 'event') 
        { 
            $controllerAdmin->event(); //va chercher la fonction event() dans AdminController pour aller sur la page de création d'un évènement à afficher dans la page d'accueil
        }

        elseif($_GET['action'] == 'createEvent'){
            $title = htmlspecialchars($_POST['title']);
            $date = htmlspecialchars($_POST['date']);
            $content = htmlspecialchars($_POST['content']);
            $picture = $_FILES['image'];
            $image = $controllerBlog->verifyFiles($picture);
            $alt = htmlspecialchars($_POST['alt']);
           
            if(!empty($title) && (!empty($content) && (!empty($date) &&(!empty($image))))){
                $data = [
                    ':title' => $title,
                    ':content' => $content,
                    ':image' => $image,
                    ':alt' => $alt,
                    ':date' => $date,
                ];

                $controllerAdmin->eventCreate($data); // va chercher la fonction eventCreate() dans AdminController pour envoyer dans la BDD les élements nécessaires à la création d'un évènement à afficher dans la page d'accueil
            } 
            else 
            {
                $error = '* Tous les champs doivent être remplis !';  
                $controllerAdmin->event($error); // renvoi un message d'erreur si tous les champs ne sont pas correctement remplis 
            }   
        }

        elseif($_GET['action'] == 'animals')
        {
            $controllerAnimal->animals(); //va chercher la fonction animals() dans AnimalController pour se rendre sur la page de création des fiches animaux
        }

        elseif($_GET['action'] == 'createAnimal')
        {
            $typeId = htmlspecialchars($_POST['race']);
            $name = htmlspecialchars($_POST['name']);
            $breed = htmlspecialchars($_POST['breed']);
            $info = htmlspecialchars($_POST['info']);
            $age = htmlspecialchars($_POST['age']);
            $content = htmlspecialchars($_POST['content']);
            $picture = $_FILES['image'];
            $image = $controllerAdmin->verifyFiles($picture);
            $alt = htmlspecialchars($_POST['alt']);
            
            if(!empty($typeId) && (!empty($name) && (!empty($breed) && (!empty($info) && (!empty($age) && (!empty($content) && (!empty($picture) && (!empty($alt))))))))){
                $valid = "La fiche a été éditée !";
                $data = [
                    'race' => $typeId,
                    'name' => $name,
                    'breed' => $breed,
                    'info' => $info,
                    'age' => $age,
                    'content' => $content,
                    'image' => $image,
                    'alt' => $alt,
                    'valid' => $valid,
                ];
                $controllerAnimal->createAnimal($data); // va chercher la fonction createAnimal() dans AnimalController qui va envoyer dans la BDD les infos nécessaires à la création d'un fiche animal
            } 
            else 
            {
                $error = '* Tous les champs doivent être remplis !';  
                $controllerAnimal->animals($error); //renvoi un message d'erreur si tous les champs ne sont pas correctment remplis
            }   
        }

        elseif($_GET['action'] == 'viewUpdatePet')
        {
            $id = $_GET['id'];
            $controllerAnimal->viewUpdatePet($id); //va chercher la fonction viewUpdateAnimal() dans AnimalController pour aller sur la page de modif d'une fiche animal
        }

        elseif($_GET['action'] == 'updateAnimal')
        {   
            $data = [
            ':id' => $_GET['id'],
            ':name' => htmlspecialchars($_POST['name']),
            ':breed' => htmlspecialchars($_POST['breed']),
            ':age' => htmlspecialchars($_POST['age']),
            ':info' => htmlspecialchars($_POST['info']),
            ':content' => htmlspecialchars($_POST['content']),
            ':alt' => htmlspecialchars($_POST['alt']),
            ];
            
            $controllerAnimal->updateAnimal($data, $_FILES);  //va chercher la fonction updateAnimal() dans AnimalController pour envoyer dans la BDD les modfis effectuées sur la fiche animal
        }

        elseif($_GET['action'] == 'deletePet')
        {
            $id = $_GET['id'];
            $controllerAnimal->deletePet($id); //va chercher la fonction deletePet() dans AnimalController pour supprimer un animal
        }

        elseif($_GET['action'] == 'articles')
        {
            $controllerBlog->articles(); //va chercher la fonction articles() dans BlogController pour se rendre sur la page de création des articles
        }

        elseif($_GET['action'] == 'createArticle')
        {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $picture = $_FILES['image'];
            $image = $controllerBlog->verifyFiles($picture);
            $alt = htmlspecialchars($_POST['alt']);
           
            if(!empty($title) && (!empty($content) && (!empty($image) && (!empty($alt))))){
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'image' => $image,
                    'alt' => $alt
                ];

                $controllerBlog->articleCreate($data); // va chercher la fonction articleCreate() dans BlogController qui va envoyer dans la BDD les infos nécessaires à la création d'une fiche article
            } 
            else 
            {
                $error = '* Tous les champs doivent être remplis !';  
                $controllerBlog->articles($error); // renvoi un message d'erreur si tous les champs ne sont pas remplis correctement
            }   
        }

        elseif($_GET['action'] == 'viewUpdateArticle')
        {
            $id = $_GET['id'];
            $controllerBlog->viewUpdateArticle($id); //va chercher la fonction viewUpdateArticle() dans BlogController pour aller sur la page de modif d'une fiche article
        }

        elseif($_GET['action'] == 'updateArticle')
        {   
            $data = [
            ':id' => htmlspecialchars($_GET['id']),
            ':title' => htmlspecialchars($_POST['title']),
            ':content' => htmlspecialchars($_POST['content']),
            ':alt' => htmlspecialchars($_POST['alt']),
            ];
            
            $controllerBlog->updateArticle($data, $_FILES); //va chercher la fonction updateArticle() dans BlogController pour envoyer dans la BDD les modfis effectuées sur la fiche article
        }

        elseif($_GET['action'] == 'deleteArticle')
        {
            $id = $_GET['id'];
            $controllerBlog->deleteArticle($id); //va chercher la fonction deleteArticle() dans BlogController pour supprimer un article
        }

        elseif($_GET['action'] == 'deleteCommentAdmin')
        {
            $id = $_GET['id'];
            $idArticle = $_GET['articleId'];
            $controllerBlog->deleteCommentAdmin($id, $idArticle); //va chercher la fonction deleteCommentAdmin() dans BlogController pour que l'admin puisse supprimer le commentaire d'un abonné
        }

        elseif($_GET['action'] == 'teamMember') // va chercher la fonction teamMember() dans AdminController pour aller sur la page de création d'un nouveau membre de l'équipe du refuge
        {
            $controllerAdmin->teamMember();
        }

        elseif($_GET['action'] == 'createTeamMember')
        {   
            $surname = htmlspecialchars($_POST['surname']);
            $content = htmlspecialchars($_POST['content']);
            $picture = $_FILES['image'];
            $image = $controllerAdmin->verifyFiles($picture);
            $alt = htmlspecialchars($_POST['alt']);
           
            if(!empty($surname) && (!empty($content) && (!empty($image) && (!empty($alt))))){
                $controllerAdmin->createTeamMember($surname, $content, $image, $alt);  // va chercher la fonction createTeamMember() dans AdminController pour envoyer les données d'un nouveau membre dans la BDD
                }
                else 
                {
                $error = '* Tous les champs doivent être remplis !';  
                $controllerAdmin->teamMember($error); // renvoi message d'erreur si tous les champs ne sont pas remplis correctement
                }   
        }

        elseif($_GET['action'] == 'viewUpdateMember') 
        {
            $id = $_GET['id'];
            $controllerAdmin->viewUpdateMember($id); // va chercher la fonction viewUpdateMember() dans AdminController pour se rendre sur la page de modif d'un membre
        }

        elseif($_GET['action'] == 'updateMember') 
        {   
            $data = [
            ':id' => $_GET['id'],
            ':surname' => htmlspecialchars($_POST['surname']),
            ':content' => htmlspecialchars($_POST['content']),
            ':alt' => htmlspecialchars($_POST['alt']),
            ];
            
            $controllerAdmin->updateMember($data, $_FILES); // va chercher la fonction updateMember() dans AdminController pour envoyer les modifs d'un membre dans la BDD
        }

        elseif($_GET['action'] == 'deleteMember')
        {
            $id = $_GET['id'];
            $controllerAdmin->deleteMember($id); // // va chercher la fonction deleteMember() dans AdminController pour supprimer la fiche d'un membre de l'équipe
        }   
    } 
    else 
    {
        $controllerAdmin->dashboardAdmin($id); // renvoi sur cette page si aucune des actions ci-dessus n'a eu lieu
    }
} 
catch (Exception $e)
{
    $error = $e->getMessage();
    require "app/Views/front/error.php";
}
catch(Error $e)
{
    $error = $e->getMessage();
    require "app/Views/front/error.php";
}
