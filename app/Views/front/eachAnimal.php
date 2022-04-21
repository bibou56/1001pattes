<?php include('header.php') ?>

<main class="content-animal container">
    <a href="index.php?action=adoptions"><i class="fa-solid fa-arrow-left"></i></a>
    <article class="eachAnimal">
        <div class="imgPet">
            <img src="app/Public/administration/images/<?= $oneAnimal['image'] ?>" alt="">
        </div>

        <div class="infoPet">
            <p class="petName">- <?= $oneAnimal['name'] ?> -</p>
            <p><span>Age</span> : <?= $oneAnimal['age'] ?></p>
            <p><span>Race/type</span> : <?= $oneAnimal['breed'] ?></p>
            <p><span>Informations générales</span> : <?= $oneAnimal['info'] ?></p>
            <p class="petContent"><span>Présentation</span> : <?= $oneAnimal['content'] ?></p>
        </div>  

        <?php
        if(isset($_SESSION['nickname'])){
            if($_SESSION['role'] === 1){ ?>
                <div class="UD-pet">
                    <button><a href="indexAdmin.php?action=viewUpdatePet&id=<?= $oneAnimal['id'] ?>">Modifier</a></button>
                    <button><a href="indexAdmin.php?action=deletePet&id=<?= $oneAnimal['id'] ?>">Supprimer</a></button>
                </div>
            <?php }
        } ?>
    </article>
</main>

<?php include('footer.php') ?>