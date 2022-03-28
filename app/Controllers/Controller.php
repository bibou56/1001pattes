<?php

namespace Projet\Controllers;

class Controller{

    public function view($viewName, $error = null)
    {
        include('app/Views/front/'.$viewName.'.php');
    }

    public function viewAdmin($viewName, $error = null)
    {
        include('app/Views/administration/'.$viewName.'.php');
    }


}