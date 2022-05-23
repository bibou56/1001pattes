<?php include('app/Views/front/header.php'); ?>

<main class="container">
    
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
            <h1>Créez une fiche Animal</h1>
            <p><img src="/app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
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

        <form method="post" action="indexAdmin.php?action=createAnimal" enctype="multipart/form-data">
            <p>
                <label for="race"></label>
                <select name="race" id="race">
                    <?php 
                    foreach($result as $type){
                    ?>
                        <option value="<?= $type['id'] ?>"><?= $type['race'] ?></option>
                    <?php } ?>
                </select>
            </p>
            <p class="img">
                <label for="image">Choisissez une photo</label>
                <input type="file" name="image" id="image">
               
            </p>
            <p>
                <label for="alt">Pour permettre le bon référencement de votre site, vous devez décrire l'image choisie</label>
                <input type="text" name="alt" id="alt" placeholder="Description brève">
            </p>
            <p>
                <label for="name">Nom de l'animal</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="breed">Race</label>
                <input type="text" name="breed" id="breed">
            </p>
            <p>
                <label for="age">Age</label>
                <input type="text" name="age" id="age">
            </p>
            <p>
                <label for="info">Infos générales (sexe, poids, santé...)</label>
                <input type="text" name="info" id="info">
            </p>
            <p>
                <label for="content">Présentation de l'animal</label>
                <textarea name="content" id="content"></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="Créer">
            </p>

        </form>

    </section>
</main>

<?php include('app/Views/front/footer.php') ?>