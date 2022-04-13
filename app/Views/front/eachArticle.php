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
    
</main>

<?php include('footer.php') ?>