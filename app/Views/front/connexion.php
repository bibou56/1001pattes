<?php include('header.php') ?>

<main class="content-form container">
    <div class="page-title">
        <p><img src="/app/Public/front/images/dogprint-black.png" alt="empreinte de patte de chien"></p>
        <h1>Connectez-vous</h1>
        <p><img src="/app/Public/front/images/catprint-black.png" alt="empreinte de patte de chat"></p>
    </div>
    <div class="form-connect">
        <div class="error">  
            <?php  
                if(isset($error)){
                    if ($error != ""){ ?>
                   <p><?= $error ?></p>
               <?php }}
            ?>  
        </div>  
        <form method="post" action="index.php?action=connect">
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="ex: milou@outlook.fr">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="*********">
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Allez-y!">
            </p>
        </form> 
    </div>

    <p>Vous n'avez pas de compte?</p> 
    <p><a href="index.php?action=createAccount"> Créez-en un ici !</a></p>
    
</main>

<?php include('footer.php') ?>