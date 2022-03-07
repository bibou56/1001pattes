<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <title>Refuge 1001 Pattes</title>
    <link rel="stylesheet" href="/app/Public/front/CSS/style.css">
</head>

<body>
    <header class="banner">
        <div class="banner-menu container">
            <div class="title-header">
                <p><a href="/"><img class="logo" src="/app/Public/front/images/logobis.png" alt="">Refuge</a></p>
                <p><a href="/">1000 et Une Pattes</a></p>
            </div>

            <div class="connect-user">
                <a href="index.php?action=connexion"><i class="fa-solid fa-user"></i></a>
            </div>

            <nav class="menu-principal">     
                <a id="link" href="#"><span id="burger"></span></a>
                <ul id="liste-nav">
                    <li><a href="/">Accueil</a></li>
                    <li><a href="index.php?action=about">A propos</a></li>
                    <li><a id="adopt" href="#">Adoptions</a></li>
                        <ul id="sous-liste">
                            <li><a href="index.php?action=cats">Chats</a></li>
                            <li><a href="index.php?action=dogs">Chiens</a></li>
                        </ul>
                    <li><a href="index.php?action=blog">Blog</a></li>
                    <li><a href="index.php?action=contact">Contact</a></li>
                </ul>
            </nav> 

        </div>     
    </header>
