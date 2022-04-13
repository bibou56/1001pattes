<?php include('header.php') ?>

<main class="content-animals container">
<a href="index.php?action=adoptions"><i class="fa-solid fa-arrow-left"></i></a>
<?php  
    if(isset($_SESSION['nickname'])){
        if($_SESSION['role'] === 1){ ?>
            <div class="addPet">
                <button><a href="indexAdmin.php?action=animals">Créer une nouvelle fiche</a></button>
            </div>
        <?php }
    }
    ?>
    <?php foreach($allDogs as $dog){ ?>
    <article class="adoptPet">
        <div class="imgPet">
            <img src="app/Public/administration/images/<?= $dog['image'] ?>" alt="">
        </div>

        <div class="allInfoPet">
            <div class="infoPet">
                <p class="petName">- <?= $dog['name'] ?> -</p>
                <p><span>Age</span> : <?= $dog['age'] ?></p>
                <p><span>Race/type</span> : <?= $dog['breed'] ?></p>
                <p><span>Informations Générales</span> : <?= $dog['info'] ?></p>
            </div>
            <div class="contentPet">
                <p><span>Présentation</span> : <?= $dog['content'] ?></p>
            </div>

            <?php
            if(isset($_SESSION['nickname'])){
                if($_SESSION['role'] === 1){ ?>
                    <div class="UD-pet">
                        <button><a href="indexAdmin.php?action=viewUpdatePet&id=<?= $dog['id'] ?>">Modifier</a></button>
                        <button><a href="indexAdmin.php?action=deletePet&id=<?= $dog['id'] ?>">Supprimer</a></button>
                    </div>
                <?php }
            } ?>
        </div>

    </article>
    <?php } ?>
</main>


<?php include('footer.php') ?>
