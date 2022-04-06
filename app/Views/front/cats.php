<?php include('header.php') ?>

<main>
    <?php foreach($allCats as $cat){ ?>
    <article class="adoptCat">
        <div class="imgCat">
            <img src="app/Public/administration/images/<?= $cat['image'] ?>" alt="">
        </div>
        <div class="infoCat">
            <p><?= $cat['name'] ?></p>
            <p><?= $cat['breed'] ?></p>
            <p><?= $cat['age'] ?></p>
            <p>Informations Générales : <?= $cat['info'] ?></p>
        </div>
        <div class="contentCat">
                <p>Présentation : <?= $cat['content'] ?></p>
        </div>
    </article>
    <?php } ?>
</main>


<?php include('footer.php') ?>