<?php

namespace Projet\Controllers;

class AnimalController extends Controller
{
    //pour se rendre sur la page de création des fiches animal
    public function animals($error = "")
    {
        $userManager = new \Projet\Models\AnimalModel();
        $types = $userManager->getTypes(); //permet de sélectionner le type d'animal (chat ou chien)
        $result = $types->fetchAll();
        require $this->viewAdmin('animals');
    }

    //création d'une fiche animal
    public function createAnimal($data)
    {
        $userManager = new \Projet\Models\AnimalModel();
        $userManager->animalCreation($data); //permet d'envoyer les infos nécessaires à la création d'un animal dans la BDD
        $types = $userManager->getTypes();
        $result = $types->fetchAll();
        
        require $this->viewAdmin('animals');
    }

    //affichage de la page de modif d'une fiche animal
    public function viewUpdatePet($id)
    {
        $userManager = new \Projet\Models\AnimalModel();
        $updateView = $userManager->findPet($id); //permet d'afficher les infos de l'animal à modifier en allant les chercher dans la BDD
        $result = $updateView->fetch();

        require $this->viewAdmin('updatePet', $result);
    }

    //permet de modifier une fiche animal
    public function updateAnimal($data, $files)
    {
        $userManager = new \Projet\Models\AnimalModel();  
        if(!empty($files['image']) && $files['image']['name'] !== "")
        {
            $data[':newImg'] = $this->verifyFiles($data);
        }
        else
        {
            $data[':newImg'] = $this->findInfoPet($data[':id'])['image'];
        }
        $animalUpdate = $userManager->updatePet($data); //envoi dans la BDD les infos modifiées sur la fiche animal
        
        require $this->view('adoptions');
    }

    public function findInfoPet($id)
    {
        $eachAnimal = new \Projet\Models\UserModel();
        $result = $eachAnimal->oneAnimal($id);
        $oneAnimal = $result->fetch();
        return $oneAnimal;
    }

    //permet de supprimer une fiche animal
    public function deletePet($id)
    {
        $userManager = new \Projet\Models\AnimalModel();
        $deletePet = $userManager->petDelete($id); //efface les données de l'animal de la BDD

        require $this->view('adoptions');
    }
}