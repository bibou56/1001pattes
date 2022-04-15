<?php

namespace Projet\Controllers;

class AdminController extends Controller
{
    //affichage de la page dashboard admin
    public function dashboardAdmin($id)
    {
        require $this->viewAdmin('dashboardAdmin');
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