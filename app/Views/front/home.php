<?php include('header.php') ?>
    
<main>
    <!-- <div class="banner-photo">
        <p><img src="/app/Public/front/images/collage.png" alt="3 photos côte à côte d'animaux"></p>
    </div> -->
    <?php
    if(isset($_SESSION['nickname'])){
        echo $_SESSION['nickname'];
    }
    ?>
</main>
<?php include('footer.php') ?>