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
}