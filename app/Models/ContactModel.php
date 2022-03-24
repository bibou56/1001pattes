<?php

namespace Projet\Models;

class ContactModel extends Manager{

    //envoyer un mail depuis le formulaire de contact
    public function postMail($lastname, $firstname, $mail, $phone, $objet, $content){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO contact(lastname, firstname, mail, phone, objet, content) VALUE(?, ?, ?, ?, ?, ?)');
        $req->execute(array($lastname, $firstname, $mail, $phone, $objet, $content));
        return $req;
    }

}