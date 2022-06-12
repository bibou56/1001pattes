<?php include('app/Views/front/header.php'); ?>

<main class="container">
    
        <div class="page-title">
            <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
            <h1>Nouveau membre de l'équipe</h1>
            <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
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

        <form method="post" action="indexAdmin.php?action=createTeamMember" enctype="multipart/form-data">
            <p class="img">
                <label for="image">Choisissez une photo</label>
                <input type="file" name="image" id="image">
               
            </p>  
            <p>
                <label for="alt">Pour permettre le bon référencement de votre site, vous devez décrire l'image choisie</label>
                <input type="text" name="alt" id="alt" placeholder="Description brève">
            </p>  
            <p>
                <label for="surname">Prénom</label>
                <input type="text" name="surname" id="surname">
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