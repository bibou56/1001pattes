<?php include('header.php') ?>

<main class="content container">
    
    <section class="content-form">
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Contactez-nous !</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>
        <p class="text-account">Vous avez une question ? Vous voulez devenir bénévole ? Vous voulez adopter un animal ? Laissez-nous votre message, nous vous répondrons le plus vite possible !</p>

        <div class="form-connect">
            <form method="post" action="index.php?action=contact">
                <p>
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" id="lastname" placeholder="DUPONT">
                </p>
                <p>
                    <label for="firstname">Nom</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Aline">
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="ex: milou@outlook.fr">
                </p>
                <p>
                    <label for="phone">Numéro de téléphone</label>
                    <input type="tel" name="phone" id="phone">
                </p>
                <p>
                    <label for="object">Objet de votre message</label>
                    <input type="text" name="object" id="object">
                </p>
                <p>
                    <label for="content">Votre message</label>
                    <textarea name="content" id="content-contact" cols="30" rows="10"></textarea>
                </p>
                <p class="consent-box">
                    <input type="checkbox" name="consent" id="consent" required>
                    <label for="consent"><a href="index.php?action=legal">J'accepte les conditions d'utilisation</a></label>
                </p>
                <p class="buttons">
                    <input type="submit" name="submit" id="submit" value="Envoyer">
                    <input type="reset" value="Annuler">
                </p>
            </form>   
        </div>
    </section>

    <section id="contact-info">
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Nos coordonnées</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>
        <div class="address">
            <i class="fas fa-map-marker-alt"></i>
            <address>
                <h3>Refuge 1000 et Une Pattes</h3>
                <p>35 rue de la Chapelle de Sainte Avoye</p>
                <p>56498 BIGOUBLEN</p>
            </address>

            <i class="far fa-user"></i>
            <p>Contact: Valentine BUYET</p>

            <i class="fas fa-phone-square"></i>
            <p>02 97 97 97 97</p>
        </div>
    </section>

    <section id="localisation">
        <div class="page-title">
            <p><img src="/app/Public/front/images/dogprint-black.png" alt=""></p>
            <h2>Où nous trouver ?</h2>
            <p><img src="/app/Public/front/images/catprint-black.png" alt=""></p>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.7413538295523!2d-2.9223621851639527!3d47.65059279293245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4810172a7f67be6d%3A0xfa74dfa61d44e408!2sEcole%20Sainte%20Anne!5e0!3m2!1sfr!2sfr!4v1637167976997!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>







    
    
    
</main>


<?php include('footer.php') ?>
