<?php include('header.php') ?>

<main class="content-animal container">

    <a href="index.php?action=adoptions" title="retour vers la page adoptions"><i class="fa-solid fa-arrow-left"></i></a>
    <article class="eachAnimal">
        <div class="imgPet">
            <img src="app/Public/administration/images/<?= $oneAnimal['image'] ?>" alt="<?= $oneAnimal['alt'] ?>">
        </div>

        <div class="infoPet">
            <h1 class="petName">- <?= $oneAnimal['name'] ?> -</h1>
            <p><span>Age</span> : <?= $oneAnimal['age'] ?></p>
            <p><span>Race/type</span> : <?= $oneAnimal['breed'] ?></p>
            <p><span>Informations générales</span> : <?= $oneAnimal['info'] ?></p>
            <p class="petContent"><span>Présentation</span> : <?= $oneAnimal['content'] ?></p>
        </div>  

        <?php
        if(isset($_SESSION['nickname'])){
            if($_SESSION['role'] == 1){ ?>
                <div class="UD-pet">
                    <button><a href="indexAdmin.php?action=viewUpdatePet&id=<?= $oneAnimal['id'] ?>" title="dirige vers la page de modification de l'animal">Modifier</a></button>
                    <button><a href="indexAdmin.php?action=deletePet&id=<?= $oneAnimal['id'] ?>" title="supprime l'animal">Supprimer</a></button>
                </div>
            <?php }
        } ?>
    </article>
</main>

<?php include('footer.php') ?>