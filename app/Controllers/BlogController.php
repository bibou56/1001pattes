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
        // var_dump($title); die;
        $userManager = new \Projet\Models\BlogModel();
        $result = $userManager->creationArticle($title, $content, $image);
        
        header('Location: indexAdmin.php?action=articles');
    }
}