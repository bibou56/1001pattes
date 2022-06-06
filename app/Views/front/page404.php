<?php include('header.php') ?>

<main class="container errorPage">
    <h1>Oups ! Cette page est introuvable</h1>
    <img src="/app/Public/front/images/sad-dog.jpg" alt="chien enroulé dans une couverture">
    <p>Vous tentez d'accéder à une page qui n'existe pas ou à laquelle vous n'avez pas accès.</p>
    <p><?= $error?></p>
    <button><a href="/">Retour à la page d'accueil du refuge</a></button>
</main>

<?php include('footer.php') ?>