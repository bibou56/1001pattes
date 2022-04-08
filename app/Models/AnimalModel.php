<?php

namespace Projet\Models;

class AnimalModel extends Manager
{
    public function getTypes()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, race FROM type');
        $req->execute();
        return $req;
    }

    public function animalCreation($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO animal(type_id, name, breed, info, age, content, image) VALUE (:type_id, :name, :breed, :info, :age, :content, :image)');
        $req->execute(array(
            ':type_id' => $data['race'], 
            ':name' => $data['name'], 
            ':breed' => $data['breed'], 
            ':info' => $data['info'], 
            ':age' => $data['age'], 
            ':content' => $data['content'],
            ':image' => $data['image']));
        return $req;
    }

    public function findPet($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image FROM animal WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function updatePet($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE animal SET name=:name, breed=:breed, age=:age, info=:info, content=:content WHERE id=:id'); 
        $req->execute($data);
        return $req;
    }

    public function petDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM animal WHERE id=?');
        $req->execute(array($id));
        return $req;
    }
}