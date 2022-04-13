<?php

namespace Projet\Models;

class UserModel extends Manager{

    public function newAccount($nickname, $mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user (nickname, mail, password) VALUE (:nickname , :mail, :password)');
        $req->execute(array(':nickname'=>$nickname, ':mail'=>$mail, ':password'=>$password));
        return $req;
    }

    public function mailCheck($mail)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, nickname, mail, password, role FROM user WHERE mail=?');
        $req->execute(array($mail));
        return $req;
    }

    public function allCats()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image FROM animal WHERE type_id = 1');
        $req->execute();
        return $req;
    }

    public function allDogs()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image FROM animal WHERE type_id = 2');
        $req->execute();
        return $req;
    }

    public function oneAnimal($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, name, breed, info, age, content, image FROM animal WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function allArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, image, createdAt FROM article');
        $req->execute();
        return $req;
    }

    public function oneArticle($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, image, createdAt  FROM article WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function allComments($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user_id, nickname, content, createdAt FROM comment INNER JOIN user ON user_id=user.id WHERE article_id=?');
        $req->execute(array($id));
        return $req;
    }

    public function createComment($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO comment (content, article_id, user_id ) VALUE (:content , :article_id, :user_id)');
        $req->execute(array(
            ':content'=>$data['content'],
            ':article_id'=>$data['idArticle'],
            ':user_id'=>$data['idUser']));
        return $req;
    }
}