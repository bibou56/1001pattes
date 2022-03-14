<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';


    $controllerFront = new \Projet\Controllers\FrontController();

    if(isset($_GET['action'])){
        
    }
