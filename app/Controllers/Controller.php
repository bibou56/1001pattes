<?php

namespace Projet\Controllers;

class Controller{

    protected function view($viewName,$error = null)
    {
        return('app/Views/front/'.$viewName.'.php');
    }

    protected function viewAdmin($viewName, $data = null)
    {
        return('app/Views/administration/'.$viewName.'.php');
    }

    public function verifyFiles($data) //vérifie les images
    {  
        $tmpName = "";
        $nameImg = "";
        $size = 0;
        $error = 0;
        $path = "app/Public/administration/images/";
        $maxSize = 400000;

        if(isset($_FILES['image']))
        {
            $tmpName = htmlspecialchars($_FILES['image']['tmp_name']);
            $nameImg = htmlspecialchars($_FILES['image']['name']);
            $size = $_FILES['image']['size'];
            $error = $_FILES['image']['error'];
            $path = 
        htmlspecialchars($path . $nameImg);

            if($size <= $maxSize && $error==0)
            {
                move_uploaded_file(htmlspecialchars($tmpName) , htmlspecialchars($path));
                return $nameImg;
            } 
            else 
            {
                $error = '* Taille du fichier trop importante';  
            }    
        }       
    }
}