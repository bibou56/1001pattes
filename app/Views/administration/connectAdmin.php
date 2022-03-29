<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection administrateur</title>
    <link rel="stylesheet" href="/app/Public/administration/CSS/style.css">
</head>
<body>
    
   <main class="content-connect container">
       <h2>Bienvenue !</h2>
       <h3>Accédez à votre espace administrateur</h3>

       <div class="error">
       <?php 
            if(isset($error)){
                if($error != ""){?>
                <p><?= $error ?></p>
            <?php }} 
        ?>
       </div>

       <form method="post" action="indexAdmin.php?action=sessionAdmin">
           <p>
               <label for="email">email</label>
               <input type="email" name="email" id="email">
           </p>
           <p>
               <label for="password">mot de passe</label>
               <input type="password" name="password" id="password">
           </p>
           <p>
               <input type="submit" name="submit" id="submit" value="Accès">
           </p>
       </form>
       
   </main> 

   </body>
</html>



