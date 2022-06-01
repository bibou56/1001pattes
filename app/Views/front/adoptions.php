<?php include('header.php') ?>

<main class="container">

    <div class="page-title">
        <p><img src="/app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
        <h1>Venez les découvrir !</h1>
        <p><img src="/app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
    </div>

    <div id="btnAnimals">
        <button><a href="index.php?action=cats" title="dirige vers la page des chats à l'adoption"><i class="fa-solid fa-cat"></i> Voir les chats à l'adoption</a></button>
        <button><a href="index.php?action=dogs" title="dirige vers la page des chiens à l'adoption"><i class="fa-solid fa-dog"></i> Voir les chiens à l'adoption</a></button>
        <?php  
        if(isset($_SESSION['nickname'])){
            if($_SESSION['role'] === 1){ ?>
                    <button><a href="indexAdmin.php?action=animals" title="dirige vers la page de création d'une fiche animal">Créer une nouvelle fiche</a></button>
            <?php }
        }
        ?>
    </div>
    
</main>

<?php include('footer.php') ?>