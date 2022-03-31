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
    public function sessionAdmin($data){
       if(empty($data)){
           return $this->viewAdmin('connectAdmin', $error=null);
       }

        if(empty($_SESSION)){
            $userManager = new \Projet\Models\AdminModel();
            $connexAdmin = $userManager->mailCheck($data['mail']);

            $result = $connexAdmin->fetch();
            
            $correctPassword = password_verify($data['password'], $result['password']);

            if($correctPassword){
                $_SESSION['mail'] = $result['mail'];
                $_SESSION['password'] = $result['password'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['fullname'] = $result['fullname'];

                return $this->viewAdmin('sessionAdmin', $error=null);
            } else{
                $error = '* Vos identifiants sont incorrects';
                return $this->viewAdmin('connectAdmin', $error);
            } 
        } else {
            return $this->viewAdmin('sessionAdmin', $error=null);
        }
    }

    //pour se rendre sur la page fiches animaux
    public function animals($error = ""){
        
        $userManager = new \Projet\Models\AdminModel();
        $types = $userManager->getTypes();

        $result = $types->fetchAll();

        

        return $this->viewAdmin('animals', $result);
    }

    public function createAnimal($typeId, $name, $breed, $info, $age, $content, $nameImg){ 
        
        $userManager = new \Projet\Models\AdminModel();
        $createdAnimal = $userManager->animalCreation($typeId, $name, $breed, $info, $age, $content, $nameImg);

        $result = $createdAnimal->fetchAll();

        // return $this->viewAdmin('animals', $valid);
    

    
}
}