<?php include('app/Views/front/header.php') ?>

<main class="container">
    
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
            <h1>Modifiez la fiche Animal</h1>
            <p><img src="/app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
        </div>

    <section class="createElement">

        <form method="post" action="indexAdmin.php?action=updateAnimal&id=<?= $result['id'] ?>" enctype="multipart/form-data">
            <p class="imgChosen">Votre image actuelle</p>
            <img src="app/Public/administration/images/<?= $result['image'] ?>" alt="<?= $result['alt'] ?>">
           
            <p class="img">
                <label for="image">Choisissez une photo </label>
                <input type="file" name="image" id="image">
            </p>
            <p>
                <label for="alt">Pour permettre le bon référencement de votre site, vous devez décrire brièvement l'image choisie</label>
                <input type="text" name="alt" id="alt" value="<?= $result['alt'] ?>"> 
            </p>
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