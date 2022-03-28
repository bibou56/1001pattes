<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/app/Public/administration/CSS/style.css">
</head>
<body>
    
   <main class="content-admin container">
       <h2>Bienvenue !</h2>
       <h3>Connectez-vous à votre espace administrateur</h3>

       <form method="post" action="indexAdmin.php?action=connectAdmin">
           <p>
               <label for="email">email</label>
               <input type="email" name="email" id="email">
           </p>
           <p>
               <label for="password">Mot de passe</label>
               <input type="password" name="password" id="password">
           </p>
           <p>
               <input type="submit" name="submit" id="submit" value="Accès">
           </p>
       </form>
       <p>Vous voulez modifier vos identifiants de session?<a href="">Cliquez ici !</a></p>
    
   </main> 

   </body>
</html>



