<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try
{
    $controllerAdmin = new \Projet\Controllers\AdminController();
    $controllerAnimal = new \Projet\Controllers\AnimalController();
    $controllerBlog = new \Projet\Controllers\BlogController();

    if(isset($_GET['action']))
    { 
        if($_GET['action'] == 'dashboardAdmin')
        {
            $controllerAdmin->dashboardAdmin();
        }

        elseif($_GET['action'] == "disconnectAdmin")
        {
            session_destroy();
            header('Location:indexAdmin.php');
        }

        elseif($_GET['action'] == 'animals')
        {
            $controllerAnimal->animals(); //va chercher la fonction animals() dans AdminController pour se rendre sur la page des fiches animaux
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
            
            if(!empty($typeId) && (!empty($name) && (!empty($breed) && (!empty($info) && (!empty($age) && (!empty($content) && (!empty($picture)))))))){
                $valid = "La fiche a été éditée !";
                $data = [
                    'race' => $typeId,
                    'name' => $name,
                    'breed' => $breed,
                    'info' => $info,
                    'age' => $age,
                    'content' => $content,
                    'image' => $image,
                    'valid' => $valid,
                ];
                $controllerAnimal->createAnimal($data);
            } 
            else 
            {
                $error = '* Tous les champs doivent être remplis !';  
                $controllerAnimal->createAnimal($error);
            }   
        }

        elseif($_GET['action'] == 'viewUpdatePet')
        {
            $id = $_GET['id'];
            $controllerAnimal->viewUpdatePet($id);
        }

        elseif($_GET['action'] == 'updateAnimal')
        {   
            $data = [
            'id' => $_GET['id'],
            'name' => htmlspecialchars($_POST['name']),
            'breed' => htmlspecialchars($_POST['breed']),
            'age' => htmlspecialchars($_POST['age']),
            'info' => htmlspecialchars($_POST['info']),
            'content' => htmlspecialchars($_POST['content']),
            ];
            
            $controllerAnimal->updateAnimal($data);  
        }

        elseif($_GET['action'] == 'deletePet')
        {
            $id = $_GET['id'];
            $controllerAnimal->deletePet($id);
        }

        elseif($_GET['action'] == 'articles')
        {
            $controllerBlog->articles();
        }

        elseif($_GET['action'] == 'createArticle')
        {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $picture = $_FILES['image'];
            $image = $controllerBlog->verifyFiles($picture);
           
            if(!empty($title) && (!empty($content) && (!empty($image)))){
                // $valid = "La fiche a été éditée !";
                // var_dump($title, $content, $image); die;
                $controllerBlog->articleCreate($title, $content, $image);
            } 
            else 
            {
                $error = '* Tous les champs doivent être remplis !';  
                $controllerBlog->articleCreate($error);
            }   
        }

        elseif($_GET['action'] == 'viewUpdateArticle')
        {
            $id = $_GET['id'];
            $controllerBlog->viewUpdateArticle($id);
        }

        elseif($_GET['action'] == 'updateArticle')
        {   
            $data = [
            'id' => $_GET['id'],
            'title' => htmlspecialchars($_POST['title']),
            'content' => htmlspecialchars($_POST['content']),
            ];
            
            $controllerBlog->updateArticle($data);  
        }

        elseif($_GET['action'] == 'deleteArticle')
        {
            $id = $_GET['id'];
            $controllerBlog->deleteArticle($id);
        }


        elseif($_GET['action'] == 'mails')
        {
            $controllerAdmin->mails();
        }

        

        elseif($_GET['action'] == 'comments')
        {
            $controllerAdmin->comments();
        }
        
    } 
    else 
    {
        // $controllerAdmin->connectAdmin();
        $controllerAdmin->dashboardAdmin();
    }

} 
catch (Exception $e)
{
    require "app/Views/administration/error.php";
}
