<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try{

    $controllerAdmin = new \Projet\Controllers\AdminController();

    if(isset($_GET['action'])){
        // if($_GET['action'] == 'createAdmin'){
        //     $fullname = htmlspecialchars($_POST['fullname']);
        //     $mail = htmlspecialchars($_POST['email']);
        //     $pass = $_POST['password'];
        //     $mdp = password_hash($pass, PASSWORD_DEFAULT);

        //     if(!empty($fullname) && (!empty($mail) && (!empty($mdp)))){
        //         $controllerAdmin->createAdminSess($fullname, $mail, $mdp);
        //     } 
        // }
        if($_GET['action'] == 'sessionAdmin'){
            $mail = htmlspecialchars($_POST['email']);
            $mdp = $_POST['password'];

            if(!empty($mail) && (!empty($mdp))){
                $data = [
                    'mail' => $mail,
                    'password' => $mdp,
                ];
                $controllerAdmin->sessionAdmin($data);
            } else {
                $error = '* Tous les champs doivent être remplis !';
                $controllerAdmin->connectAdmin($error);
            }
        }
        elseif($_GET['action'] == 'homeAdmin'){
            $controllerAdmin->sessionAdmin(['test']);
        }
        elseif($_GET['action'] == "disconnectAdmin"){
            session_destroy();
            header('Location:indexAdmin.php');
        }
        elseif($_GET['action'] == 'animals'){
            $controllerAdmin->animals(); //va chercher la fonction animals() dans AdminController pour se rendre sur la page des fiches animaux
        }
        elseif($_GET['action'] == 'createAnimal'){
            $typeId = htmlspecialchars($_POST['race']);
            $name = htmlspecialchars($_POST['name']);
            $breed = htmlspecialchars($_POST['breed']);
            $info = htmlspecialchars($_POST['info']);
            $age = htmlspecialchars($_POST['age']);
            $content = htmlspecialchars($_POST['content']);
            // $image = htmlspecialchars($_FILES['image']);
            

            if(isset($_FILES['image'])){
            $tmpName = $_FILES['image']['tmp_name'];
            $nameImg = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $error = $_FILES['image']['error'];
            }

            $extensions = ['jpeg', 'jpg', 'png', 'gif'];
            $split = explode(".", $nameImg);
            $extension = strtolower(end($split));
            $maxSize = 400000;
            
            if(!empty($typeId) && (!empty($name) && (!empty($breed) && (!empty($info) && (!empty($age) && (!empty($content) && (!empty($nameImg)))))))){

                if(in_array($extension, $extensions) && $size <= $maxSize){
                    move_uploaded_file($tmpName, 'app/Public/administration/images/'.$nameImg);

                    $valid = "La fiche Animale a été éditée";
                        
                    $controllerAdmin->createAnimal($typeId, $name, $breed, $info, $age, $content, $nameImg, $valid);
                } else {
                    $error = '* Mauvaise extension ou taille du fichier trop importante';
                       
                    $controllerAdmin->animals($error);
                }
            } else {
                $error = '* Tous les champs doivent être remplis !';
                    
                $controllerAdmin->animals($error);
            }   
        }
        
    } else {
        // $controllerAdmin->connectAdmin();
        $controllerAdmin->sessionAdmin($data=null);
    }

} catch (Exception $e){
    require "app/Views/administration/error.php";
}
