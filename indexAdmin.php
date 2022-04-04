<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try{

    $controllerAdmin = new \Projet\Controllers\AdminController2();

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
        // if($_GET['action'] == 'formAdminConnect' {
        //     $controllerAdmin->formAdminConnect();
        // }

        if($_GET['action'] == 'dashboardAdmin'){
            $controllerAdmin->dashboardAdmin();
        }

        if($_GET['action'] == 'connectAdmin'){
            $mail = htmlspecialchars($_POST['email']);
            $mdp = $_POST['password'];

            if(!empty($mail) && (!empty($mdp))){
                $data = [
                    'mail' => $mail,
                    'password' => $mdp,
                ];
                $controllerAdmin->connectAdmin($data);

            } else {
                $error = '* Tous les champs doivent être remplis !';
                $controllerAdmin->formAdminConnect($error);
            }
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
            $picture = $_FILES['image'];
            $image = $controllerAdmin->verifyFiles($picture);
            
            if(!empty($typeId) && (!empty($name) && (!empty($breed) && (!empty($info) && (!empty($age) && (!empty($content) && (!empty($picture)))))))){
                $valid = "La fiche 'Animal' a été éditée";

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

                $controllerAdmin->createAnimal($data);
   
            } else {
                $error = '* Tous les champs doivent être remplis !';
                    
                $controllerAdmin->createAnimal($error);
            }   
        }
        
    } else {
        // $controllerAdmin->connectAdmin();
        $controllerAdmin->formAdminConnect();
    }

} catch (Exception $e){
    require "app/Views/administration/error.php";
}
