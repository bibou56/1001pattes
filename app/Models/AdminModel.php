<?php 

namespace Projet\Models;

class AdminModel extends Manager{

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
}