<?php include('header.php') ?>

<main class="content-articles container">
    <a href="index.php?action=blog"><i class="fa-solid fa-arrow-left"></i></a>
    <article class="eachArticle">
        <div class="imgArticle">
            <img src="app/Public/administration/images/<?= $oneArticle['image'] ?>" alt="">
        </div>

        <div class="infoArticle">
            <p class="dateArticle"><?= $oneArticle['createdAt'] ?></p>
            <p class="titleArticle">- <?= $oneArticle['title'] ?> -</p>
            <p class="contentArticle"><?= $oneArticle['content'] ?></p>
            
            <?php
            if(isset($_SESSION['nickname'])){
                if($_SESSION['role'] === 1){ ?>
                    <div class="UD-article">
                        <button><a href="indexAdmin.php?action=viewUpdateArticle&id=<?= $oneArticle['id'] ?>">Modifier</a></button>
                        <button><a href="indexAdmin.php?action=deleteArticle&id=<?= $oneArticle['id'] ?>">Supprimer</a></button>
                    </div>
                <?php }
            } ?>

        </div>
    </article>
    
    <?php
    if(isset($_SESSION['nickname'])){ ?>
    <section class="writeComment">
        <form method="post" action="index.php?action=writeComment&user_id=<?= $_SESSION['id'] ?>&article_id=<?= $oneArticle['id'] ?>">
            <p>
                <label for="comment">Ecrivez un commentaire</label>
                <textarea name="comment" id="comment"></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="Publier">
            </p>
        </form>
    </section>
    <?php } ?>
    
    <section class="comments">
        <h3>Commentaires</h3>
        <?php 
        foreach($comments as $comment) {?>
        <p><?= $comment['content'] ?></p>
        <?php } ?>
    </section>

</main>

<?php include('footer.php') ?>