<?php include('header.php') ?>

<main class="content-animals container">
    <a href="index.php?action=adoptions"><i class="fa-solid fa-arrow-left"></i></a>
    <article class="eachAnimal">
        <div class="imgPet">
            <img src="app/Public/administration/images/<?= $oneAnimal['image'] ?>" alt="">
        </div>

        <div class="infoPet">
            <p class="dateArticle"><?= $oneAnimal['createdAt'] ?></p>
            <p class="titleArticle">- <?= $oneAnimal['title'] ?> -</p>
            <p class="contentArticle"><?= $oneAnimal['content'] ?></p>
            
            <?php
            if(isset($_SESSION['nickname'])){
                if($_SESSION['role'] === 1){ ?>
                    <div class="UD-pet">
                        <button><a href="indexAdmin.php?action=viewUpdatePet&id=<?= $oneAnimal['id'] ?>">Modifier</a></button>
                        <button><a href="indexAdmin.php?action=deletePet&id=<?= $oneAnimal['id'] ?>">Supprimer</a></button>
                    </div>
                <?php }
            } ?>

        </div>

    </article>
    
</main>

<?php include('footer.php') ?>