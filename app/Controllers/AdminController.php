<?php

namespace Projet\Controllers;

class AdminController extends Controller
{
    //affichage de la page dashboard admin
    public function dashboardAdmin()
    {
        require $this->viewAdmin('dashboard');
    }


    public function mails()
    {
        require $this->viewAdmin('mails');
    }

    
    public function comments()
    {
        require $this->viewAdmin('comments');
    }

}