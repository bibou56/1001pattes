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
    {  if(isset($_FILES['image'])){
        $tmpName = $_FILES['image']['tmp_name'];
        $nameImg = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        }

        $maxSize = 400000;
        
        if($size <= $maxSize && $error==0){
            move_uploaded_file($tmpName, 'app/Public/administration/images/'.$nameImg);

        return $nameImg;
        } 
        else 
        {
                $error = '* Mauvaise extension ou taille du fichier trop importante';  
        }    
    }


}