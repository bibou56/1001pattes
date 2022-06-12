<?php
namespace Projet\Models;

use Exception;

class Manager
{
    protected function dbConnect()
    {
        try
        {
            $bdd = new \PDO('mysql:host=mysql-murielk.alwaysdata.net;dbname=murielk_refuge1001pattes;charset=utf8', 'murielk', '2022Projet');
            return $bdd;
        } 
        catch (Exception $e)
        {
            die('Erreur:' . $e->getMessage()); 
        }
    }
}