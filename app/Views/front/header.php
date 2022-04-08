<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <link rel="shortcut icon" href="/app/Public/front/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <title>Refuge 1001 Pattes</title>
    <link rel="stylesheet" href="/app/Public/front/CSS/style.css">
    <link rel="stylesheet" href="/app/Public/administration/CSS/style.css">
</head>

<body>
    <header id="top-content">
        <div class="title-header container">
            <?php
            if(isset($_SESSION['nickname'])){
                if($_SESSION['role'] === 1){ ?>
                    <p><a href="/"><img class="logo" src="/app/Public/front/images/logobis.png" alt="">Votre espace admin</a></p>
                <?php }
                elseif($_SESSION['role'] === 0){ ?>
                    <p><a href="/"><img class="logo" src="/app/Public/front/images/logobis.png" alt="">Refuge 1000 et Une Pattes</a></p>
                <?php }
            }
            else { ?>
                <p><a href="/"><img class="logo" src="/app/Public/front/images/logobis.png" alt="">Refuge 1000 et Une Pattes</a></p>
            <?php }
            ?>   
        </div>

        <div class="banner container">
            <nav class="menu-principal">     
                <a id="link" href="#"><span id="burger"></span></a>
                <ul id="liste-nav">
                    <?php 
                    if(isset($_SESSION['nickname'])){
                        if($_SESSION['role'] === 1){ ?>
                            <li><a href="indexAdmin.php?action=dashboardAdmin">Tableau de bord</a></li>
                        <?php }
                        elseif($_SESSION['role'] === 0){ ?>
                            <li><a href="index.php?action=dashboardAdmin">Mon espace</a></li>
                        <?php }
                    }?>
                    <li><a class="active" href="/">Accueil</a></li>
                    <li><a href="index.php?action=about">A propos</a></li>
                    <li id="adopt"><a href="index.php?action=adoptions">Adoptions</a>
                        <!-- <ul id="sous-liste">
                            <li><a href="index.php?action=cats">Les chats</a></li>
                            <li><a href="index.php?action=dogs">Les chiens</a></li>
                        </ul> -->
                    </li>
                    <li><a href="index.php?action=blog">Blog</a></li>
                    <li><a href="index.php?action=contact">Contact</a></li>
                    <?php
                    if(isset($_SESSION['nickname'])){
                        if($_SESSION['role'] === 1){ ?>
                            <li><a href="indexAdmin.php?action=animals">Création des fiches Animaux</a></li>
                            <li><a href="indexAdmin.php?action=mails">Messages</a></li>
                            <li><a href="indexAdmin.php?action=comments">Gestion des commentaires</a></li>
                        <?php }
                    } ?>
                    
                </ul>
            </nav> 

            <div class="connect-user">
            <?php
            if(isset($_SESSION['nickname'])){
                if($_SESSION['role'] === 0) {?>
                    <p>Bonjour , <?= $_SESSION['nickname']?></p>
                    <p><a href="index.php?action=disconnect">Déconnexion</a></p>
                <?php } 

                elseif($_SESSION['role'] === 1){ ?>
                    <p>Bienvenue, <?= $_SESSION['nickname'] ?></p>
                    <p><a href="index.php?action=disconnect">Déconnexion</a></p>
                <?php }}
            
            else {?>
                    <a href="index.php?action=connexion"><i class="fa-solid fa-user"></i></a>
                <?php }
            ?>
            </div>

                
        </div>     
    </header>
