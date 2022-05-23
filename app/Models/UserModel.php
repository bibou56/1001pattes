<?php

namespace Projet\Models;

class UserModel extends Manager
{
    //permet de compter le nombre de chats à l'adoption
    public function countCats()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM animal WHERE type_id=1');
        $req->execute();
        return $req;
    }

    //permet de compter le nombre de chiens à l'adoption
    public function countDogs()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM animal WHERE type_id=2');
        $req->execute();
        return $req;
    }

    //permet d'aller récupérer les données d'un évènement créé
    public function findEvent()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT image, alt, title, date, content, createdAt FROM event ORDER BY createdAt DESC LIMIT 1');
        $req->execute();
        return $req;
    }

    //permet de récupérer les données des derniers animaux arrivés au refuge
    public function lastPets()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, name, image, alt, createdAt FROM animal ORDER BY createdAt DESC');
        $req->execute();
        return $req;
    }

    //permet de récupérer les données afin d'afficher les membres de l'équipe créés
    public function findTeam()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, surname, content, image, alt FROM team');
        $req->execute();
        return $req;
    }

    //permet d'afficher tous les chats créés dans la BDD
    public function allCats()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image, alt, createdAt FROM animal WHERE type_id = 1 ORDER BY createdAt DESC');
        $req->execute();
        return $req;
    }

    //permet d'afficher tous les chiens créés dans la BDD
    public function allDogs()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, type_id, name, breed, info, age, content, image, alt, createdAt FROM animal WHERE type_id = 2 ORDER BY createdAt DESC');
        $req->execute();
        return $req;
    }

    //permet de récupérer les infos de chaque animal créé pour les afficher dans une page individualisée
    public function oneAnimal($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, name, breed, info, age, content, image, alt, createdAt FROM animal WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //permet de récupérer les données des articles pour afficher toutes les cartes article sur la page Blog
    public function allArticles()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, image, alt, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM article ORDER BY createdAt DESC');
        $req->execute();
        return $req;
    }

    //permet de récupérer les données d'un article en particulier afin de'lafficher dans une page individualisée
    public function oneArticle($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, image, alt, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM article WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //permet d'afficher les commentaires liés à cet article
    public function allComments($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user_id, comment.id, nickname, content, DATE_FORMAT(createdAt, "Posté le %d/%m/%Y à %H:%i") AS date FROM comment INNER JOIN user ON user_id=user.id WHERE article_id=? ORDER BY createdAt DESC');
        $req->execute(array($id));
        return $req;
    }

    //permet d'envoyer dans la BDD les infos de création d'un commentaire
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

    // permet de récupérer les données de tous les commentaires écrits par l'abonné pour les afficher dans son espace perso 
    public function userAllComments($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, content, DATE_FORMAT(createdAt, "Posté le %d/%m/%Y à %H:%i") AS date FROM comment WHERE user_id=? ORDER BY createdAt DESC');
        $req->execute(array(intval($id)));
        return $req;
    }

    //efface de la BDD tous les éléments liés au commentaire
    public function commentDelete($id) 
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM comment WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //envoi dans la BDD les infos nécessaires à la création d'un compte
    public function newAccount($nickname, $mail, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user (nickname, mail, password) VALUE (:nickname , :mail, :password)');
        $req->execute(array(':nickname'=>$nickname, ':mail'=>$mail, ':password'=>$password));
        return $req;
    }

    //vérifie si l'adresse mail est connue
    public function mailCheck($mail)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, nickname, mail, password, role FROM user WHERE mail=?');
        $req->execute(array($mail));
        return $req;
    }

    //envoi dans le BDD toutes les infos remplis dans le formulaire de contact
    public function postMail($lastname, $firstname, $mail, $phone, $objet, $content){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO contact(lastname, firstname, mail, phone, objet, content) VALUE(?, ?, ?, ?, ?, ?)');
        $req->execute(array($lastname, $firstname, $mail, $phone, $objet, $content));
        return $req;
    }   
}