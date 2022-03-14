<?php include('header.php') ?>

<main class="content-form container">
    <div class="page-title">
        <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
        <h2>Créez votre compte</h2>
        <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
    </div>
    <p class="text-account">En créant votre compte sur le site de <span class="our-name">1000 et Une Pattes</span>, vous pourrez recevoir des invitations à tous nos évènements et participer à la vie de notre blog. Plus notre communauté grandit, plus les animaux de notre refuge ont de chance de trouver leur nouvelle famille! Alors n'hésitez plus et rejoignez-nous!</p>
        <div class="error">  
            <?php  
                if(isset($error)){
                    if ($error != ""){ ?>
                   <p><?= $error ?></p>
               <?php }}
            ?>  
        </div>  
    <div class="form-connect">
        <form method="post" action="index.php?action=newAccount">
        
            <p>
                <label for="nickname">Choisissez votre pseudo</label>
                <input type="text" name="nickname" id="nickname" placeholder="ex: Rantanplan">
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="ex: milou@outlook.fr">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="**********">
            </p>
            <p>
                <label for="password-verif">Verification mot de passe</label>
                <input type="password" name="password-verif" id="password-verif" placeholder="**********">
            </p>
            <p id="consent-box">
                <input type="checkbox" name="consent" id="consent" required>
                <label for="consent"><a href="index.php?action=legal">J'accepte les conditions d'utilisation</a></label>
            </p>
            
            <p>
                <input type="submit" name="submit" id="submit" value="Bienvenue">
            </p>

        </form>
        
        
    </div>
    
</main>

<?php include('footer.php') ?>


