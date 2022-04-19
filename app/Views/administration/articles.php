<?php include('app/Views/front/header.php'); ?>

<main class="container">
    
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Créer un article</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>

    <section class="createElement">
        <div class="error">  
            <?php  
                if(isset($error)){
                    if ($error != ""){ ?>
                   <p><?= $error ?></p>
               <?php }}
            ?> 
        </div>
        <?php  
        if(isset($data['valid'])){ ?>
            <div class="valid">
                <div class="modal">
                    <?php if ($data['valid'] != ""){ ?>
                        <a href="#"><i class="fa-solid fa-x"></i></a>
                        <p><?= $data['valid'] ?></p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <form method="post" action="indexAdmin.php?action=createArticle" enctype="multipart/form-data">
            <p>
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" id="title">
            </p>
            <p class="img">
                <label for="image">Choisissez une photo</label>
                <input type="file" name="image" id="image">
               
            </p>
            <p>
                <label for="content">Contenu de votre article</label>
                <textarea name="content" id="content"></textarea>
            </p>
            
            <p>
                <input type="submit" name="submit" value="Créer">
            </p>

        </form>

    </section>
</main>

<?php include('app/Views/front/footer.php') ?>