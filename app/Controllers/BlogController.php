<?php

namespace Projet\Controllers;

class BlogController extends Controller
{
    public function articles($error = '')
    {
        require $this->viewAdmin('articles');
    }

    public function articleCreate($title, $content, $image)
    {
        $userManager = new \Projet\Models\BlogModel();
        $result = $userManager->creationArticle($title, $content, $image);
        
        require $this->viewAdmin('articles');
    }

    public function viewUpdateArticle($id)
    {
        $userManager = new \Projet\Models\BlogModel();
        $updateView = $userManager->findArticle($id);
        $result = $updateView->fetch();

        require $this->viewAdmin('updateArticle', $result);
    }

    public function updateArticle($data)
    {
        $userManager = new \Projet\Models\BlogModel();  
        $articleUpdate = $userManager->updateArticle($data);
        
        $blog = new \Projet\Models\UserModel();
        $result = $blog->allArticles();
        $allArticles = $result->fetchAll();
        require $this->view('blog');
    }

    public function deleteArticle($id)
    {
        $userManager = new \Projet\Models\BlogModel();
        $deleteArticle = $userManager->articleDelete($id);

        $blog = new \Projet\Models\UserModel();
        $result = $blog->allArticles();
        $allArticles = $result->fetchAll();
        require $this->view('blog');
    }
}