<?php

namespace Projet\Models;

class UserModel extends Manager{

    public function newAccount($nickname, $mail, $password){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user (nickname, mail, password) VALUE (:nickname , :mail, :password)');
        $req->execute(array(':nickname'=>$nickname, ':mail'=>$mail, ':password'=>$password));
        return $req;
    }

    public function mailCheck($mail){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, nickname, mail, password, role FROM user WHERE mail=?');
        $req->execute(array($mail));
        return $req;
    }

    public function allCats(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT type_id, name, breed, info, age, content, image FROM animal WHERE type_id = 1');
        $req->execute();
        return $req;
    }
}