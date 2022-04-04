<?php

namespace Projet\Controllers;

class Controller{

    public function view($viewName,$error = null)
    {
        include('app/Views/front/'.$viewName.'.php');
    }

    public function viewAdmin($viewName, $data = null)
    {
        include('app/Views/administration/'.$viewName.'.php');
    }

    public function verifyFiles($data) //vérifie les images
    {  if(isset($_FILES['image'])){
        $tmpName = $_FILES['image']['tmp_name'];
        $nameImg = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        }

        // $extensions = ['jpeg', 'jpg', 'png', 'gif'];
        // $split = explode(".", $data['image']);
        // $extension = strtolower(end($split));
        $maxSize = 400000;
        
        
        if($size <= $maxSize && $error==0){
            move_uploaded_file($tmpName, 'app/Public/administration/images/'.$nameImg);

        return $nameImg;
    

        } else {
                $error = '* Mauvaise extension ou taille du fichier trop importante';  
        }    
    }


}