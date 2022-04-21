<?php include('header.php') ?>

<main class="content-articles container">
    
    <?php  
    if(isset($_SESSION['nickname'])){
        if($_SESSION['role'] === 1){ ?>
            <div class="addArticle">
                <button><a href="indexAdmin.php?action=articles">Créer un nouvel article</a></button>
            </div>
        <?php }
    }
    ?>

    <div id="seeAllArticles">
        <?php foreach($allArticles as $article){ ?>
        <article class="allArticles">
            <div class="imgArticle">
                <img src="app/Public/administration/images/<?= $article['image'] ?>" alt="">
            </div>

            <div class="infoArticle">
                <p class="dateArticle"><?= $article['date'] ?></p>
                <p class="titleArticle"><?= $article['title'] ?></p>
                <p class="extractArticle"><?= mb_substr($article['content'], 0, 150) ?>[...]</p>
                
                <button><a href="index.php?action=eachArticle&id=<?= $article['id'] ?>">Lire la suite</a></button>
            </div>
        </article>
        <?php } ?>
    </div>
</main>


<?php include('footer.php') ?>
