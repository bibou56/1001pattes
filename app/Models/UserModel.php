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

    public function countCats()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM animal WHERE type_id=1');
        $req->execute();
        return $req;
    }

    public function countDogs()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM animal WHERE type_id=2');
        $req->execute();
        return $req;
    }

    public function findEvent()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT image, title, date, content, createdAt FROM event ORDER BY createdAt DESC LIMIT 1');
        $req->execute();
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
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image, createdAt FROM animal WHERE type_id = 1 ORDER BY createdAt DESC');
        $req->execute();
        return $req;
    }

    public function allDogs()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image, createdAt FROM animal WHERE type_id = 2 ORDER BY createdAt DESC');
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
        $req = $bdd->prepare('SELECT id, title, content, image, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM article ORDER BY createdAt DESC');
        $req->execute();
        return $req;
    }

    public function oneArticle($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, image, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM article WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function allComments($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user_id, nickname, content, DATE_FORMAT(createdAt, "Posté le %d/%m/%Y à %H:%i") AS date FROM comment INNER JOIN user ON user_id=user.id WHERE article_id=? ORDER BY createdAt DESC');
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

    public function userAllComments($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, content, DATE_FORMAT(createdAt, "Posté le %d/%m/%Y à %H:%i") AS date FROM comment WHERE user_id=? ORDER BY createdAt DESC');
        $req->execute(array(intval($id)));
        return $req;
    }

    public function findTeam()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, surname, content, image FROM team');
        $req->execute();
        return $req;
    }

    public function commentDelete($id) //supprime un commentaire dans la BDD
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM comment WHERE id=?');
        $req->execute(array($id));
        return $req;
    }
}