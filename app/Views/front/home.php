<?php include('header.php') ?>
    
<main class="main-content container">
    <h1>Bienvenue sur le site du refuge 1000 et Une Pattes</h1>

    <div id="top">
        <section id="nbrOfPets">
            <div class="page-title">
                <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
                <h2>Ils n'attendent que vous !</h2>
                <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
            </div>

            <div id="nbrOfCats">
                <p><img src="./app/Public/administration/images/cat2.jpg" alt="chat"><span><?php $totalCats = $catCount->fetch(); echo $totalCats[0]; ?></span></p>
                <p>chats à l'adoption</p>
            </div>

            <div id="nbrOfDogs">
                <p><img src="./app/Public/administration/images/dog1.jpg" alt="chien"><span><?php $totalDogs = $dogCount->fetch(); echo $totalDogs[0]; ?></span></p>
                <p>chiens à l'adoption</p>
            </div>
        </section>

        <section id="nextEvent">
            <?php
            if($resultEvent) { ?>
            <div class="page-title">
                <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
                <h2>C'est pour bientôt !</h2>
                <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
            </div>

            <div class="event">
                <img src="app/Public/administration/images/<?= $resultEvent['image'] ?>" alt="<?= $resultEvent['alt'] ?>">
                <div class="eventContent">
                    <p class="titleEvent"><?= $resultEvent['title'] ?></p>
                    <p class="dateEvent"><?= $resultEvent['date'] ?></p>
                    <p class="contentEvent"><?= $resultEvent['content'] ?></p>
                </div>
            <?php } ?>

        <?php
        if(isset($_SESSION['nickname'])){
            if($_SESSION['role'] == 1){ ?>
                <div id="createEvent">
                    <button><a href="indexAdmin.php?action=event" title="dirige vers la page de création d'un évènement">Créer un évènement</a></button>
                </div>
            <?php }
        } ?>
        </section>
    </div>

    <div id="lastEntrance">
        <div class="page-title">
            <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
            <h2>Nos dernières arrivées</h2>
            <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
        </div>

        <?php 
        for($i=0 ; $i<3 ; $i++){?>
            <article class="arrival">
                <p><img src="app/Public/administration/images/<?= $lastPets[$i]['image'] ?>" alt="<?= $lastPets[$i]['alt'] ?>"></p>
                <button><a href="index.php?action=eachAnimal&id=<?= $lastPets[$i]['id'] ?>" title="dirige vers la page de présentation de l'animal">- Découvrez <?= $lastPets[$i]['name'] ?> -</a></button>
            </article>
        <?php } 
        ?>
    </div>
    
</main>
<?php include('footer.php') ?>