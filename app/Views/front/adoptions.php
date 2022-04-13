<?php include('header.php') ?>

<main class="container">
    <div id="btnAnimals">
        <button><a href="index.php?action=cats"><i class="fa-solid fa-cat"></i> Voir les chats à l'adoption</a></button>
        <button><a href="index.php?action=dogs"><i class="fa-solid fa-dog"></i> Voir les chiens à l'adoption</a></button>
        <?php  
        if(isset($_SESSION['nickname'])){
            if($_SESSION['role'] === 1){ ?>
                    <button><a href="indexAdmin.php?action=animals">Créer une nouvelle fiche</a></button>
            <?php }
        }
        ?>
    </div>
    
</main>

<?php include('footer.php') ?>