<?php include('app/Views/front/header.php') ?>

<main class="content-mail container">
    <a href="indexAdmin.php?action=dashboardAdmin&id=<?= $result['id'] ?>"><i class="fa-solid fa-arrow-left"></i></a>
    <article class="eachMail">
        <p>Mail : <?= $result['mail'] ?></p>
        <p>Envoyé le : <?= $result['date'] ?></p>
        <p>Expéditeur : <?= $result['lastname'], " ", $result['firstname'] ?></p>
        <p>Tél : <?= $result['phone'] ?></p>
        <p>Objet : <?= $result['objet'] ?></p>
        <p class="mailContent">"<?= $result['content'] ?>"</p>  
        <div id="actions-mail">
            <button><a href="mailto:<?= $result['mail'] ?>">Répondre</a></button>
            <button><a href="indexAdmin.php?action=deleteMail&id=<?= $result['id'] ?>">Supprimer</a></button>
        </div>   
    </article>
</main>

<?php include('app/Views/front/footer.php') ?>