<?php include('header.php') ?>

<main class="content-articles container">
    
    <div class="page-title">
        <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
        <h1>La vie du refuge</h1>
        <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
    </div>

    <?php  
    if(isset($_SESSION['nickname'])){
        if($_SESSION['role'] == 1){ ?>
            <div class="addArticle">
                <button><a href="indexAdmin.php?action=articles" title="dirige vers la page de création d'un article">Créer un nouvel article</a></button>
            </div>
        <?php }
    }
    ?>

    <div id="seeAllArticles">
        <?php foreach($allArticles as $article){ ?>
        <article class="allArticles">
            <div class="imgArticle">
                <img src="app/Public/administration/images/<?= $article['image'] ?>" alt="<?= $article['alt'] ?>">
            </div>

            <div class="infoArticle">
                <p class="dateArticle"><?= $article['date'] ?></p>
                <p class="titleArticle"><?= $article['title'] ?></p>
                <p class="extractArticle"><?= mb_substr($article['content'], 0, 150) ?>[...]</p>
                
                <button><a href="index.php?action=eachArticle&id=<?= $article['id'] ?>" title="dirige vers l'article">Lire la suite</a></button>
            </div>
        </article>
        <?php } ?>
    </div>
</main>

<?php include('footer.php') ?>
