<?php include('header.php') ?>

<main class="content-pets container">
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

    <div id="allPets">
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
                <div class="extractPet">
                    <p><span>Présentation</span> : <?= mb_substr($cat['content'], 0, 200) ?>[...]</p>
                    <button><a href="index.php?action=eachAnimal&id=<?= $cat['id'] ?>">Lire la suite</a></button>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>
</main>


<?php include('footer.php') ?>