<?php  include('header.php') ?>

<main class="container">
    <section class="userComments">
    <p id="howTo">Bienvenue sur votre espace personnel. Vous pouvez y retrouver tous vos commentaires laissés dans nos articles. Vous avez la possibilté de les supprimer si vous le souhaitez.</p>   
    <h2>Vos commentaires</h2> 
        <?php
        foreach($userAllComments as $allComments){ ?>
            <div class="commentsUser">
                <div class="content">
                    <p class="datePost"><?= $allComments['date'] ?></p>
                    <p>"<?= $allComments['content'] ?>"</p>
                </div>
                <div class="deleteComment">
                    <a href="index.php?action=deleteComment&id=<?= $allComments['id'] ?>"><img src="/app/Public/front/images/bin.png" alt="icone poubelle"></a>
                </div>
            </div>

        <?php } ?>
    </section>
</main>

<?php include('footer.php') ?>