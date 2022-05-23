<?php

namespace Projet\Models;

class BlogModel extends Manager
{
    //permet d'envoyer les infos nécessaires à la création d'un article dans la BDD
    public function creationArticle($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO article(title, content, image, alt ) VALUE(:title, :content, :image, :alt)');
        $req->execute(array(
            ':title' => $data['title'],
            ':content' => $data['content'],
            ':image' => $data['image'],
            'alt' => $data['alt']));
        return $req;
    }

    //permet d'afficher les infos de l'article à modifier en allant les chercher dans la BDD
    public function findArticle($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, content, image, alt, createdAt FROM article WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    //envoi dans la BDD les infos modifiées sur l'article
    public function updateArticle($data)
    {  
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE article SET title=:title, content=:content, image=:newImg, alt=:alt WHERE id=:id'); 
        $req->execute($data);
        return $req;
    }

    //efface les données de l'article de la BDD
    public function articleDelete($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM article WHERE id=?');
        $req->execute(array($id));
        return $req;
    }
}