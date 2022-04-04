<?php

namespace Projet\Controllers;

class AdminController2 extends Controller{

    //pour créer un profil administrateur
    function createAdminSess($fullname, $mail, $mdp){
        $admin = new \Projet\Models\AdminModel();
        $sessionAdmin = $admin->newAccount($fullname, $mail, $mdp);
    }

    //affichage de la page de connection admin
    public function formAdminConnect(){ 
        return $this->viewAdmin('formAdminConnect');
    }

    //affichage de la page dashboard admin
    public function dashboardAdmin(){
        return $this->viewAdmin('dashboard');
    }

    //connection à la session admin
    public function connectAdmin($data){
        $userManager = new \Projet\Models\AdminModel();
        $connexAdmin = $userManager->mailCheck($data['mail']);

        $result = $connexAdmin->fetch();

        $correctPassword = password_verify($data['password'], $result['password']);

        if($correctPassword){
            $_SESSION['mail'] = $result['mail'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['fullname'] = $result['fullname'];

            header('Location: indexAdmin.php?action=dashboardAdmin');
        }
        else 
        {
            $error = '* Vos identifiants sont incorrects';
            header('Location: formAdminConnect');
        }
    }


    //pour se rendre sur la page fiches animaux
    public function animals($error = ""){
        
        $userManager = new \Projet\Models\AdminModel();
        $types = $userManager->getTypes();

        $result = $types->fetchAll();

        require "app/Views/administration/animals.php";
        // return $this->viewAdmin('animals', $result);
    }

//     public function createAnimal($data){ 
        
//         
        
//             $userManager->animalCreation($data);
//             require "app/Views/administration/animals.php";

//        
// }
    public function createAnimal($data){
        $userManager = new \Projet\Models\AdminModel();
        $userManager->animalCreation($data);
        $types = $userManager->getTypes();
        
        $result = $types->fetchAll();
        require "app/Views/administration/animals.php";

    }
}