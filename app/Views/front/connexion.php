<?php include('header.php') ?>

<main class="content-connexion container">
    <h2>Connectez-vous à votre compte</h2>
    <div class="form-connect">
        <form method="post" action="">
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Allez-y!">
            </p>
        </form>
        
        
    </div>
    <p>Vous n'avez pas de compte? <a href="#"> Créez-en un!</a></p>
    
</main>

<?php include('footer.php') ?>