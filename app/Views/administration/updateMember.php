<?php include('app/Views/front/header.php') ?>

<main class="container">
    
        <div class="page-title">
            <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
            <h1>Modifiez un membre</h1>
            <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
        </div>

    <section class="createElement">

        <form method="post" action="indexAdmin.php?action=updateMember&id=<?= $result['id'] ?>" enctype="multipart/form-data">
            <p class="imgChosen">Votre image actuelle</p>
            <img src="app/Public/administration/images/<?= $result['image'] ?>" alt="<?= $result['alt'] ?>">

            <p class="img">
                <label for="image">Choisissez une photo</label>
                <input type="file" name="image" id="image">
               
            </p>
            <p>
                <label for="alt">Pour permettre le bon référencement de votre site, vous devez décrire brièvement l'image choisie</label>
                <input type="text" name="alt" id="alt" value="<?= $result['alt'] ?>"> 
            </p>
            <p>
                <label for="surname">Prénom</label>
                <input type="text" name="surname" id="surname" value="<?= $result['surname'] ?>">
            </p>
            <p>
                <label for="content">Présentation</label>
                <textarea name="content" id="content"><?= $result['content'] ?></textarea>
            </p>
            <p>
                <input type="submit" name="submit" value="Modifier">
            </p>

        </form>

    </section>
</main>

<?php include('app/Views/front/footer.php') ?>