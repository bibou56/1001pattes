<?php include('headerAdmin.php'); ?>

<main class="container">
    <section id="createAnimal">
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Créez une fiche Animal</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>
        <div class="error">  
            <?php  
                if(isset($error)){
                    if ($error != ""){ ?>
                   <p><?= $error ?></p>
               <?php }}
            ?>  
            <?php  
                if(isset($data['valid'])){
                    if ($data['valid'] != ""){ ?>
                   <p><?= $data['valid'] ?></p>
               <?php }}
            ?>  
        </div>  
        

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

<?php include('footerAdmin.php') ?>