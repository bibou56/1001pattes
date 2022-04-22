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
                <div class="extractPet">
                    <p><span>Présentation</span> : <?= mb_substr($dog['content'], 0, 150) ?>[...]</p>
                    <button><a href="index.php?action=eachAnimal&id=<?= $dog['id'] ?>">Lire la suite</a></button>
                </div>
            </div>

        </article>
        <?php } ?>
    </div>
</main>


<?php include('footer.php') ?>
