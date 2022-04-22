<?php include('app/Views/front/header.php'); ?>

<main class="container">
    <div class="page-title">
        <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
        <h2>Votre prochain évènement</h2>
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

        <form method="post" action="indexAdmin.php?action=createEvent" enctype="multipart/form-data">
            <p class="img">
                <label for="image">Choisissez une photo</label>
                <input type="file" name="image" id="image">
            </p>    
            <p>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title">
            </p>
            <p>
                <label for="date">Date(s) de l'évènement</label>
                <input type="text" name="date" id="date">
            </p>
            <p>
                <label for="content">Présentation</label>
                <textarea name="content" id="content"></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="Créer">
            </p>
        </form>
    </section>
</main>

<?php include('app/Views/front/footer.php') ?>