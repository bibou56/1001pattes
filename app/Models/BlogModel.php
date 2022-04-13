<?php

namespace Projet\Models;

class BlogModel extends Manager
{
    public function creationArticle($title, $content, $image)
    {
        $bdd = $this->dbConnect();
        // var_dump($title, $content, $image); die;
        $req = $bdd->prepare('INSERT INTO article(title, content, image ) VALUE(?, ?, ?)');
        
        // var_dump($req); die;
        $req->execute(array($title, $content, $image));
        
        return $req;
    }
}