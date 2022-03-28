<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';


    $controllerAdmin = new \Projet\Controllers\AdminController();

    if(isset($_GET['action'])){
        
    } else {
        $controllerAdmin->home();
    }
