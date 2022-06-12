<?php include('header.php') ?>

<main class="container">
    <section id="presentation">
        <div class="page-title">
            <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
            <h1>Qui sommes-nous ?</h1>
            <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
        </div>
        <div id="aboutUs">
            <div id="img-presentation">
                <img src="./app/Public/front/images/about.jpg" alt="femme assise sur un balcon qui fait un calin à un chien dans ses bras ">
            </div>
            <div id="content-presentation">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa voluptatibus doloremque, numquam, quaerat, porro id rem suscipit molestias fugiat autem facilis culpa maxime dignissimos?</p> 
                <p>Cumque ratione aliquam voluptates impedit veritatis inventore accusamus eligendi ab molestias rem corporis, hic sit unde eius aut, placeat perspiciatis consequatur atque temporibus ut fugit. Aliquam, distinctio. Aliquam accusamus autem recusandae est impedit tenetur, fuga iure ullam sit rerum dolor aperiam cumque pariatur molestiae quod in, ut, odit hic fugiat aut et dolores saepe consectetur!</p> 
                <p>Perferendis, deleniti omnis similique est numquam cumque modi vero quia iste? Tempore perferendis ducimus rem nihil consectetur facere sint. Sint cupiditate in, architecto laudantium voluptatum commodi quas amet ad suscipit? Numquam iste eveniet, id repudiandae laboriosam corporis et voluptas. Nisi ex quidem est soluta dolores? Rem corporis suscipit nisi est mollitia nihil quaerat amet alias, repellendus laborum rerum aliquam, voluptatibus pariatur provident.</p> 
                <p>Quos blanditiis debitis ipsa. Id quis laudantium, numquam veniam cumque tempore nesciunt, saepe incidunt exercitationem velit labore totam, corrupti tenetur illo odit. Recusandae adipisci minus fugit sit debitis asperiores, nostrum officia sunt repellendus perspiciatis deserunt suscipit.</p> 
            </div>
        </div>
    </section>

    <section id="ourTeam">
        <div class="page-title">
            <p><img src="./app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
            <h2>Découvrez l'équipe</h2>
            <p><img src="./app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
        </div>
        
        <div id="members">
            <?php
            foreach($resultTeam as $oneMember)  {?>
            <article class="eachMember">
                <img src="app/Public/administration/images/<?= $oneMember['image'] ?>" alt="<?= $oneMember['alt'] ?>">
                <p class="surname"><?= $oneMember['surname'] ?></p>
                <p class="who"><?= $oneMember['content'] ?></p>
                <?php
                if(isset($_SESSION['nickname'])){
                    if($_SESSION['role'] == 1){ ?>
                        <div class="UD-team">
                            <button><a href="indexAdmin.php?action=viewUpdateMember&id=<?= $oneMember['id'] ?>" title="dirige vers la page de modification">Modifier</a></button>
                            <button><a href="indexAdmin.php?action=deleteMember&id=<?= $oneMember['id'] ?>" title="supprime le membre de l'équipe">Supprimer</a></button>
                        </div>
                    <?php }
                } ?>
            </article>
            <?php } ?>
        </div>

        <?php
        if(isset($_SESSION['nickname'])){
            if($_SESSION['role']==1){ ?>
            <button id="btnCreate"><a href="indexAdmin.php?action=teamMember">Créer un nouveau membre</a></button>
            <?php }
        } ?>
        
    </section>

</main>


<?php include('footer.php') ?>
