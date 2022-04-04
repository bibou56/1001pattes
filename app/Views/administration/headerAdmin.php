<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace administrateur</title>
    <link rel="stylesheet" href="/app/Public/administration/CSS/style.css">
</head>

<header id="top-content-admin">
    <p><a href="/"><img class="logo" src="/app/Public/front/images/logobis.png" alt="">Refuge 1000 et Une Pattes</a></p>
    
    <div class="banner container">
        <nav class="menu-principal">     
            <a id="link" href="#"><span id="burger"></span></a>
                <ul id="liste-nav">
                    <li><a class="active" href="indexAdmin.php?action=dashboardAdmin">Accueil</a></li>
                    <li><a href="">Mes messages</a></li>
                    <li><a href="indexAdmin.php?action=animals">Animaux</a></li>
                    <li><a href="">Dernières adoptions</a></li>
                    <li><a href="">Articles Blog</a></li>
                    <li><a href="">A propos</a></li>
                    <li><a href="">Voir le site</a></li>
                    <li><a href="indexAdmin.php?action=disconnectAdmin">Se déconnecter</a></li>
                </ul>
        </nav> 
        <p>Bienvenue, <?= $_SESSION['fullname'] ?></p>
        
        
    </div>
    
</header>