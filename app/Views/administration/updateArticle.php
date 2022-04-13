<?php include('app/Views/front/header.php') ?>

<main class="container">
    
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Modifier l'article</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>

    <section class="createElement">

        <form method="post" action="indexAdmin.php?action=updateArticle&id=<?= $result['id'] ?>" enctype="multipart/form-data">
            
            <!-- <p class="img">
                <label for="image">Choisissez une photo</label>
                <input type="file" name="image" id="image" value="">card
               
            </p> -->
            <p>
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" id="title" value="<?= $result['title'] ?>">
            </p>
            <p>
                <label for="content">Contenu de l'article</label>
                <textarea name="content" id="content"><?= $result['content'] ?></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="Modifier">
            </p>

        </form>

    </section>
</main>

<?php include('app/Views/front/footer.php') ?>