<?php include('header.php') ?>

<main class="content-animals container">
    <a href="index.php?action=adoptions"><i class="fa-solid fa-arrow-left"></i></a>
    <?php foreach($allCats as $cat){ ?>
    <article class="adoptPet">
        <div class="imgPet">
            <img src="app/Public/administration/images/<?= $cat['image'] ?>" alt="">
        </div>

        <div class="allInfoPet">
            <div class="infoPet">
                <p class="petName">- <?= $cat['name'] ?> -</p>
                <p><span>Age</span> : <?= $cat['age'] ?></p>
                <p><span>Race/type</span> : <?= $cat['breed'] ?></p>
                <p><span>Informations Générales</span> : <?= $cat['info'] ?></p>
            </div>
            <div class="contentPet">
                <p><span>Présentation</span> : <?= $cat['content'] ?></p>
            </div>

            <?php
            if(isset($_SESSION['nickname'])){
            if($_SESSION['role'] === 1){ ?>
                <div class="UD-pet">
                    <button><a href="indexAdmin.php?action=viewUpdatePet&id=<?= $cat['id'] ?>">Modifier</a></button>
                    <button><a href="indexAdmin.php?action=deletePet&id=<?= $cat['id'] ?>">Supprimer</a></button>
                </div>
            <?php }
            } ?>
        </div>

    </article>
    <?php } ?>

</main>


<?php include('footer.php') ?>