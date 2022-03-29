<?php

namespace Projet\Controllers;

class AdminController extends Controller{
    function createAdminSess($fullname, $mail, $mdp){
        $admin = new \Projet\Models\AdminModel();
        $sessionAdmin = $admin->newAccount($fullname, $mail, $mdp);
    }
    //pour se rendre sur la page de connection admin
    public function connectAdmin($error = null){ 
        return $this->viewAdmin('connectAdmin', $error);
    }

    //pour se connecter à son espace admin
    public function sessionAdmin($mail, $mdp){
        $userManager = new \Projet\Models\AdminModel();
        $connexAdmin = $userManager->mailCheck($mail);

        $result = $connexAdmin->fetch();

        $correctPassword = password_verify($mdp, $result['password']);

        if($correctPassword){
            $_SESSION['mail'] = $result['mail'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['fullname'] = $result['fullname'];

            return $this->viewAdmin('sessionAdmin');
        } else{
            $error = '* Vos identifiants sont incorrects';
            return $this->viewAdmin('connectAdmin', $error);
        } 
    }

    //pour se rendre sur la page fiches animaux
    public function animals($valid = null, $error = null){
        return $this->viewAdmin('animals', $valid, $error);
    }

    public function createAnimal($typeId, $name, $breed, $info, $age, $content, $image){
        $userManager = new \Projet\Models\AdminModel();
        $createdAnimal = $userManager->animalCreation($typeId, $name, $breed, $info, $age, $content, $image);

        $result = $createdAnimal->fetchAll();

        return $this->viewAdmin('animals', $valid);
    

    
}
}