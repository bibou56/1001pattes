<?php include('header.php') ?>
    
<main class="main-content container">
    <h1>Bienvenue sur le site de notre refuge</h1>

    <div id="top">
        <section id="nbrOfPets">
            <div class="page-title">
                <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
                <h2>Ils n'attendent que vous !</h2>
                <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
            </div>

            <div id="nbrOfCats">
                <p><img src="/app/Public/administration/images/cat2.jpg" alt="chat"><span><?php $totalCats = $catCount->fetch(); echo $totalCats[0]; ?></span></p>
                <p>chats</p>
            </div>

            <div id="nbrOfDogs">
                <p><img src="/app/Public/administration/images/dog1.jpg" alt=""><span><?php $totalDogs = $dogCount->fetch(); echo $totalDogs[0]; ?></span></p>
                <p>chiens</p>
            </div>
        </section>

        <section id="nextEvent">
        <?php
            if($resultEvent) { ?>
                    <div class="page-title">
                        <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
                        <h2>C'est pour bientôt !</h2>
                        <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
                    </div>

                    <div class="event">
                        <img src="app/Public/administration/images/<?= $resultEvent['image'] ?>" alt="">
                        <div class="eventContent">
                            <p class="titleEvent"><?= $resultEvent['title'] ?></p>
                            <p class="dateEvent"><?= $resultEvent['date'] ?></p>
                            <p class="contentEvent"><?= $resultEvent['content'] ?></p>
                        </div>
                    </div>
            <?php } ?>

                <?php
                if(isset($_SESSION['nickname'])){
                    if($_SESSION['role'] === 1){ ?>
                <button><a href="indexAdmin.php?action=event">Créer un évènement</a></button>
                <?php }
            } ?>
        </section>
    </div>

    <div id="lastEntrance">
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Nos dernières arrivées</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>

        <?php 
        for($i=0 ; $i<3 ; $i++){?>
            <article class="arrival">
                <p><img src="app/Public/administration/images/<?= $lastPets[$i]['image'] ?>" alt=""></p>
                <button><a href="index.php?action=eachAnimal&id=<?= $lastPets[$i]['id'] ?>">- <?= $lastPets[$i]['name'] ?> -</a></button>
            </article>
        <?php } 
        ?>
    </div>
    
</main>
<?php include('footer.php') ?>