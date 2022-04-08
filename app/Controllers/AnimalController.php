<?php

namespace Projet\Controllers;

class AnimalController extends Controller
{
    //pour se rendre sur la page fiches animaux
    public function animals($error = "")
    {
        $userManager = new \Projet\Models\AnimalModel();
        $types = $userManager->getTypes();
        $result = $types->fetchAll();
        require $this->viewAdmin('animals');
    }

    //création d'une fiche 'Animal'
    public function createAnimal($data)
    {
        $userManager = new \Projet\Models\AnimalModel();
        $userManager->animalCreation($data);
        $types = $userManager->getTypes();
        $result = $types->fetchAll();
        
        require $this->viewAdmin('animals');
    }

    public function viewUpdatePet($id)
    {
        $userManager = new \Projet\Models\AnimalModel();
        $updateView = $userManager->findPet($id);
        $result = $updateView->fetch();

        require $this->viewAdmin('updatePet', $result);
    }

    public function updateAnimal($data)
    {
        $userManager = new \Projet\Models\AnimalModel();  
        $animalUpdate = $userManager->updatePet($data);
        
        require $this->view('adoptions');
    }

    public function deletePet($id)
    {
        $userManager = new \Projet\Models\AnimalModel();
        $deletePet = $userManager->petDelete($id);

        require $this->view('adoptions');
    }
}