<?php

namespace Projet\Controllers;

class AdminController extends Controller{
    //pour se rendre sur la page de connection admin
    public function home(){ 
        return $this->viewAdmin('connectAdmin');
    }
}