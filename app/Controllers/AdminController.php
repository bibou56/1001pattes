<?php

namespace Projet\Controllers;

class AdminController extends Controller{

    //affichage de la page dashboard admin
    public function dashboardAdmin()
    {
        require $this->viewAdmin('dashboard');
    }

    //pour se rendre sur la page fiches animaux
    public function animals($error = "")
    {
        $userManager = new \Projet\Models\AdminModel();
        $types = $userManager->getTypes();
        $result = $types->fetchAll();
        require $this->viewAdmin('animals');
    }

    //création d'une fiche 'Animal'
    public function createAnimal($data)
    {
        $userManager = new \Projet\Models\AdminModel();
        $userManager->animalCreation($data);
        $types = $userManager->getTypes();
        $result = $types->fetchAll();
        
        require $this->viewAdmin('animals');
    }

    public function mails()
    {
        require $this->viewAdmin('mails');
    }

    public function comments()
    {
        require $this->viewAdmin('comments');
    }
}