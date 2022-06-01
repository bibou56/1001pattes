<?php include('header.php') ?>

<main class="content-articles container">
    <a href="index.php?action=blog" title="retour vers le blog"><i class="fa-solid fa-arrow-left"></i></a>
    <article class="eachArticle">
        <div class="imgArticle">
            <img src="app/Public/administration/images/<?= $oneArticle['image'] ?>" alt="<?= $oneArticle['alt'] ?>">
        </div>

        <div class="infoArticle">
            <p class="dateArticle"><?= $oneArticle['date'] ?></p>
            <h1 class="titleArticle"><?= $oneArticle['title'] ?></h1>
            <p class="contentArticle"><?= $oneArticle['content'] ?></p>
            
            <?php
            if(isset($_SESSION['nickname'])){
                if($_SESSION['role'] === 1){ ?>
                    <div class="UD-article">
                        <button><a href="indexAdmin.php?action=viewUpdateArticle&id=<?= $oneArticle['id'] ?>" title="dirige vers la page de modification de l'article">Modifier</a></button>
                        <button><a href="indexAdmin.php?action=deleteArticle&id=<?= $oneArticle['id'] ?>" title="supprime l'article">Supprimer</a></button>
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
        <div class="eachComment">
            <div class="content-comment">
                <p class="nicknameUser"><?= $comment['nickname'] ?></p>
                <p class="datePost"><?= $comment['date'] ?></p>
                <p>"<?= $comment['content'] ?>"</p>
            </div>
            <?php
            if(isset($_SESSION['nickname'])){
                if($_SESSION['role'] === 1){ ?>
                <div class="deleteComment">
                    <a href="indexAdmin.php?action=deleteCommentAdmin&id=<?= $comment['id'] ?>&articleId=<?= $comment['article_id'] ?>" title="supprime le commentaire"><img src="/app/Public/front/images/bin.png" alt="icone poubelle"></a>
                </div>
                <?php }
            } ?>
        </div>
        <?php } ?>
    </section>

</main>

<?php include('footer.php') ?>