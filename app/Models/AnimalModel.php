<?php

namespace Projet\Models;

class AnimalModel extends Manager
{
    //permet de sélectionner le type d'animal (chat ou chien)
    public function getTypes()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, race FROM type');
        $req->execute();
        return $req;
    }

    //permet d'envoyer les infos nécessaires à la création d'un animal dans la BDD
    public function animalCreation($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO animal(type_id, name, breed, info, age, content, image, alt) VALUE (:type_id, :name, :breed, :info, :age, :content, :image, :alt)');
        $req->execute(array(
            ':type_id' => $data['race'], 
            ':name' => $data['name'], 
            ':breed' => $data['breed'], 
            ':info' => $data['info'], 
            ':age' => $data['age'], 
            ':content' => $data['content'],
            ':image' => $data['image'],
            ':alt' => $data['alt'] ));
        return $req;
    }

    //permet d'afficher les infos de l'animal à modifier en allant les chercher dans la BDD
    public function findPet($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image, alt FROM animal WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

     //envoi dans la BDD les infos modifiées sur la fiche animal
    public function updatePet($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE animal SET name=:name, breed=:breed, age=:age, info=:info, content=:content, image=:newImg, alt=:alt WHERE id=:id'); 
        $req->execute($data);
        return $req;
    }

    //efface les données de l'animal de la BDD
    public function petDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM animal WHERE id=?');
        $req->execute(array($id));
        return $req;
    }
}