<?php include('app/Views/front/header.php') ?>

<main class="container">
    
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Modifier la fiche</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>

    <section class="createElement">

        <form method="post" action="indexAdmin.php?action=updateAnimal&id=<?= $result['id'] ?>" enctype="multipart/form-data">
            
            <!-- <p class="img">
                <label for="image">Choisissez une photo</label>
                <input type="file" name="image" id="image" value="">card
               
            </p> -->
            <p>
                <label for="name">Nom de l'animal</label>
                <input type="text" name="name" id="name" value="<?= $result['name'] ?>">
            </p>
            <p>
                <label for="breed">Race</label>
                <input type="text" name="breed" id="breed" value="<?= $result['breed'] ?>">
            </p>
            <p>
                <label for="age">Age</label>
                <input type="text" name="age" id="age" value="<?= $result['age'] ?>">
            </p>
            <p>
                <label for="info">Infos générales (sexe, poids, santé...)</label>
                <input type="text" name="info" id="info" value="<?= $result['info'] ?>">
            </p>
            <p>
                <label for="content">Présentation de l'animal</label>
                <textarea name="content" id="content"><?= $result['content'] ?></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="Modifier">
            </p>

        </form>

    </section>
</main>

<?php include('app/Views/front/footer.php') ?>