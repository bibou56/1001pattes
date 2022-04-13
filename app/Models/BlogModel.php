<?php

namespace Projet\Models;

class BlogModel extends Manager
{
    public function creationArticle($title, $content, $image)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO article(title, content, image ) VALUE(?, ?, ?)');
        $req->execute(array($title, $content, $image));
        
        return $req;
    }

    public function findArticle($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, image, createdAt FROM article WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    public function updateArticle($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE article SET title=:title, content=:content WHERE id=:id'); 
        $req->execute($data);
        return $req;
    }

    public function articleDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM article WHERE id=?');
        $req->execute(array($id));
        return $req;
    }
}