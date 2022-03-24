<?php

namespace Projet\Controllers;

class Controller{

    public function view($viewName, $error = null)
    {
        include('app/Views/front/'.$viewName.'.php');
    }
}