<?php include('header.php') ?>

<main class="content-form container">
    <div class="page-title">
        <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
        <h2>Connectez-vous</h2>
        <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
    </div>
    <div class="form-connect">
        <form method="post" action="">
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="ex: milou@outlook.fr" required>
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="*********" required>
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Allez-y!">
            </p>
        </form>
        
        
    </div>
    <p>Vous n'avez pas de compte? <a href="index.php?action=createAccount"> Créez-en un ici !</a></p>
    
</main>

<?php include('footer.php') ?>