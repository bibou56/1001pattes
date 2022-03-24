<?php

namespace Projet\Models;

class UserModel extends Manager{

    public function newAccount($nickname, $mail, $password){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user (nickname, mail, password) VALUE (:nickname , :mail, :password)');
        $req->execute(array(':nickname'=>$nickname, ':mail'=>$mail, ':password'=>$password));
        return $req;
    }

    public function passCheck($mail){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, nickname, mail, password FROM user WHERE mail=?');
        $req->execute(array($mail));
        return $req;
    }
}