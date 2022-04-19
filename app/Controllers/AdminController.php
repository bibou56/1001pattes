<?php

namespace Projet\Controllers;

class AdminController extends Controller
{
    //affichage de la page dashboard admin
    public function dashboardAdmin($id)
    {
        $countMails = new \Projet\Models\AdminModel();
        $mailCount = $countMails->countMails(); //permet de compter le nombre de messages
        
        $showMails = new \Projet\Models\AdminModel();
        $messages = $showMails->allMessages(); //permet d'afficher les messages
        
        $totalMessages = $messages->fetchAll();

        require $this->viewAdmin('dashboardAdmin');
    }

    public function eachMail($id)
    {
        $eachMail = new \Projet\Models\AdminModel();
        $oneMail = $eachMail->findMail($id);

        $result = $oneMail->fetch();

        require $this->viewAdmin('eachMail');
    }

    public function deleteMail($id)
    {
        $deleteMail = new \Projet\Models\AdminModel();
        $mailDelete = $deleteMail->mailDelete($id);

        header('Location:indexAdmin.php?action=dashboardAdmin&id='. $_SESSION['id']);
    }

    public function teamMember()
    {
        require $this->viewAdmin('createTeamMember');
    }

    public function createTeamMember($surname, $content, $image)
    {
        $userManager = new \Projet\Models\AdminModel();
        $result = $userManager->teamCreate($surname, $content, $image);

        header('Location:index.php?action=about');
    }

    public function viewUpdateMember($id)
    {
        $userManager = new \Projet\Models\AdminModel();
        $updateMember = $userManager->findMember($id);
        $result = $updateMember->fetch();

        require $this->viewAdmin('updateMember', $result);
    }

    public function updateMember($data)
    {
        $userManager = new \Projet\Models\AdminModel();  
        $memberUpdate = $userManager->updateMember($data);
        
        header('Location: index.php?action=about');
    }

    public function deleteMember($id)
    {
        $userManager = new \Projet\Models\AdminModel();
        $deleteMember = $userManager->memberDelete($id);

        header('Location: index.php?action=about');
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