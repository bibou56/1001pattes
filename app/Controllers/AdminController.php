<?php

namespace Projet\Controllers;

class AdminController extends Controller
{
    //affichage de la page dashboard admin
    public function dashboardAdmin($id)
    {
        $countMails = new \Projet\Models\AdminModel();
        $mailCount = $countMails->countMails(); //permet de compter le nombre de mails envoyés par le biais du formulaire de contact
        
        $showMails = new \Projet\Models\AdminModel();
        $messages = $showMails->allMessages(); //permet d'afficher tous les mails
        $totalMessages = $messages->fetchAll();

        $countUsers = new \Projet\Models\AdminModel();
        $userCount = $countUsers->countUsers(); //permet de compter le nombre d'abonnés

        $showUsers = new \Projet\Models\AdminModel();
        $users = $showUsers->allUsers(); //permet d'afficher tous les abonnés
        $totalUser = $users->fetchAll();

        require $this->viewAdmin('dashboardAdmin');
    }

    //affichage d'une page individualisée pour chaque mail
    public function eachMail($id)
    {
        $eachMail = new \Projet\Models\AdminModel();
        $oneMail = $eachMail->findMail($id); //permet d'afficher les éléments de chaque mail en allant les chercher dans la BDD

        $result = $oneMail->fetch();

        require $this->viewAdmin('eachMail');
    }

    //permet de supprimer un mail
    public function deleteMail($id)
    {
        $deleteMail = new \Projet\Models\AdminModel();
        $mailDelete = $deleteMail->mailDelete($id); //efface les infos du mail de la BDD

        header('Location:indexAdmin.php?action=dashboardAdmin&id='. $_SESSION['id']);
    }

    //permet de supprimer un abonné
    public function deleteUser($id)
    {
        $deleteUser = new \Projet\Models\AdminModel();
        $userDelete = $deleteUser->userDelete($id); //efface les infos de l'abonné de la BDD

        header('Location:indexAdmin.php?action=dashboardAdmin&id='. $_SESSION['id']);
    }

    //affichage de la page de création d'un évènement pour la page d'accueil
    public function event($error = '')
    {
        require $this->viewAdmin('createEvent');
    }

    //permet de créer un évènement
    public function eventCreate($data)
    {
        $userManager = new \Projet\Models\AdminModel();
        $result = $userManager->creationEvent($data); //envoi les infos de l'évènement dans la BDD

        $controllerFront = new \Projet\Controllers\FrontController();
        $controllerFront->home();
    }

    //affichage de la page de création d'un membre de l'équipe pour la page A propos
    public function teamMember($error = '')
    {
        require $this->viewAdmin('createTeamMember');
    }

    //permet de créer un membre de l'équipe
    public function createTeamMember($surname, $content, $image, $alt)
    {
        $userManager = new \Projet\Models\AdminModel();
        $result = $userManager->teamCreate($surname, $content, $image, $alt); //envoi les infos du membre dans la BDD

        header('Location:index.php?action=about');
    }

    //affichage de la page de modif d'un membre de l'équipe
    public function viewUpdateMember($id)
    {
        $userManager = new \Projet\Models\AdminModel();
        $updateMember = $userManager->findMember($id);
        $result = $updateMember->fetch(); //va chercher les infos de ce membre dans la BDD pour les afficher et permettre leur modif

        require $this->viewAdmin('updateMember', $result);
    }

    //permet de modif un membre de l'équipe
    public function updateMember($data, $files)
    {
        $userManager = new \Projet\Models\AdminModel();
        
        if(!empty($files['image']) && $files['image']['name'] !== "")
        {
            $data[':newImg'] = $this->verifyFiles($data);
        } 
        else
        {
            $data[':newImg'] = $this->findInfoTeam($data[':id'])['image']; 
        }
        $memberUpdate = $userManager->updateMember($data); //envoi dans la BDD les données modifiées sur le membre de l'équipe
        
        header('Location: index.php?action=about');
    }


    public function findInfoTeam()
    {
        $userManager = new \Projet\Models\UserModel();
        $teamMembers = $userManager->findTeam();
        $resultTeam = $teamMembers->fetchAll();
        return $resultTeam;
    }

    //permet de supprimer un membre de l'équipe
    public function deleteMember($id)
    {
        $userManager = new \Projet\Models\AdminModel();
        $deleteMember = $userManager->memberDelete($id); //efface les données de ce membre de la BDD

        header('Location: index.php?action=about');
    }

}