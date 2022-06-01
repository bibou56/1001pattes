<?php

namespace Projet\Controllers;

class BlogController extends Controller
{
    //pour se rendre sur la page de création des articles 
    public function articles($error = '')
    {
        require $this->viewAdmin('articles');
    }

    //création d'un article
    public function articleCreate($data)
    {
        $userManager = new \Projet\Models\BlogModel();
        $result = $userManager->creationArticle($data); //permet d'envoyer les infos nécessaires à la création d'un article dans la BDD
        
        header('Location:index.php?action=blog');
    }

    //affichage de la page de modif d'un article
    public function viewUpdateArticle($id)
    {
        $userManager = new \Projet\Models\BlogModel();
        $updateView = $userManager->findArticle($id); //permet d'afficher les infos de l'article à modifier en allant les chercher dans la BDD
        $result = $updateView->fetch();

        require $this->viewAdmin('updateArticle', $result);
    }

    //permet de modifier un article
    public function updateArticle($data, $files)
    {
        $userManager = new \Projet\Models\BlogModel(); 

        if(!empty($files['image']) && $files['image']['name'] !== "")
        {
            $data[':newImg'] = $this->verifyFiles($data);
        } 
        else
        {
            $data[':newImg'] = $this->findInfoArticle($data[':id'])['image']; 
        }
        $articleUpdate = $userManager->updateArticle($data); //envoi dans la BDD les infos modifiées sur l'article
        
        $blog = new \Projet\Models\UserModel();
        $result = $blog->allArticles();
        $allArticles = $result->fetchAll();
        require $this->view('blog');
    }

    function findInfoArticle($id)
    {
        $eachArticle = new \Projet\Models\UserModel();
        $result = $eachArticle->oneArticle($id);
        $oneArticle = $result->fetch();
        return $oneArticle;
    }

    //permet de supprimer un article
    public function deleteArticle($id)
    {
        $userManager = new \Projet\Models\BlogModel();
        $deleteArticle = $userManager->articleDelete($id); //efface les données de l'article de la BDD

        header('Location:index.php?action=blog');
    }

    //permet à l'admin de supprimer n'importe quel commentaire
    public function deleteCommentAdmin($id, $idArticle)
    {
        $userComments = new \Projet\Models\UserModel();
        $deleteComment = $userComments->commentDeleteAdmin($id); //efface les données du commentaires de la BDD

        header('Location:index.php?action=eachArticle&id='. $idArticle);
    }
}