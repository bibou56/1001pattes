<?php 

namespace Projet\Models;

class AdminModel extends Manager
{
    //permet de compter le nombre de mails envoyés par le biais du formulaire de contact dans le dashboardAdmin
    public function countMails()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM contact');
        $req->execute();
        return $req;
    }

    //permet d'afficher tous les mails dans le dashboardAdmin
    public function allMessages()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, lastname, firstname, mail, objet, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM contact ORDER BY createdAt DESC'); 
        $req->execute();
        return $req;
    }

    //permet de compter le nombre d'abonnés dans le dashboardAdmin
    public function countUsers()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM user');
        $req->execute();
        return $req;
    }

    //permet d'afficher tous les abonnés dans le dashboardAdmin
    public function allUsers()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, nickname, mail, role FROM user'); 
        $req->execute();
        return $req;
    }

    //permet d'afficher les éléments de chaque mail, sur la page eachMail, en allant les chercher dans la BDD 
    public function findMail($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, lastname, firstname, mail, phone, objet, content, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM contact WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //efface les infos du mail de la BDD
    public function mailDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM contact WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //efface les infos de l'abonné de la BDD
    public function userDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM user WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //envoi les infos de création de l'évènement dans la BDD
    public function creationEvent($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO event(image, alt, title, date, content) VALUE(:image, :alt, :title, :date, :content)');
        $req->execute(array(
            ':image' => $data['image'],
            ':alt' => $data['alt'],
            ':title' => $data['title'],
            ':date' => $data['date'],
            ':content' => $data['content'], ));
        return $req;
    }
    
    //envoi les infos de création du membre dans la BDD
    public function teamCreate($surname, $content, $image, $alt)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO team (surname, content, image, alt) VALUE (:surname, :content, :image, :alt)');
        $req->execute(array(
            ':surname'=>$surname,
            ':content'=>$content,
            ':image'=>$image,
            ':alt'=>$alt));
        return $req;
    }

    //va chercher les infos de ce membre dans la BDD pour les afficher et permettre leur modif
    public function findMember($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, surname, content, image, alt FROM team WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //envoi dans la BDD les données modifiées sur le membre de l'équipe
    public function updateMember($data)
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE team SET surname=:surname, content=:content, image=:newImg, alt=:alt WHERE id=:id'); 
        $req->execute($data);
        return $req;
    }

    //efface les données de ce membre de la BDD
    public function memberDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM team WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    

    

    
}