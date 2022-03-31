<?php 

namespace Projet\Models;

class AdminModel extends Manager{

    public function newAccount($fullname, $mail, $mdp){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO admin(fullname, mail, password) VALUE (:fullname, :mail, :password)');
        $req->execute(array(':fullname'=>$fullname, ':mail'=>$mail, ':password'=>$mdp));
        return $req;
    }

    public function mailCheck($mail){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, fullname, mail, password FROM admin WHERE mail=?');
        $req->execute(array($mail));
        return $req;
    }

    public function getTypes(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, race FROM type');
        $req->execute();
        return $req;
    }

    public function animalCreation($typeId, $name, $breed, $info, $age, $content, $nameImg){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO animal(type_id, name, breed, info, age, content, image) VALUE (:type_id, :name, :breed, :info, :age, :content, :image)');
        $req->execute(array(':type_id' => $typeId, ':name' => $name, ':breed' => $breed, ':info' => $info, ':age' => $age, ':content' => $content, ':image' => $nameImg));
        return $req;
    }
}