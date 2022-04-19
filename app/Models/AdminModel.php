<?php 

namespace Projet\Models;

class AdminModel extends Manager
{
    public function teamCreate($surname, $content, $image)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO team (surname, content, image) VALUE (:surname, :content, :image)');
        $req->execute(array(
            ':surname'=>$surname,
            ':content'=>$content,
            ':image'=>$image));
        return $req;
    }

    public function findMember($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, surname, content, image FROM team WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function updateMember($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE team SET surname=:surname, content=:content WHERE id=:id'); 
        $req->execute($data);
        return $req;
    }

    public function memberDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM team WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function countMails()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM contact');
        $req->execute();
        return $req;
    }

    public function allMessages()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, lastname, firstname, mail, objet, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM contact ORDER BY createdAt DESC'); 
        $req->execute();
        return $req;
    }

    public function findMail($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, lastname, firstname, mail, phone, objet, content, DATE_FORMAT(createdAt, "%d/%m/%Y à %H:%i") AS date FROM contact WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function mailDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM contact WHERE id=?');
        $req->execute(array($id));
        return $req;
    }
}