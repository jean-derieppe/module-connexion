<!-- include Header.php -->
<?php include("header.php") ?>

<html>
   <head>
   <html lang="fr">
   <meta charset="utf-8">
   <!-- importer le fichier de style -->
   <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
   <title>Admin</title>
   </head>

   <body>

      <div class="div1">

         <form action="" method="post">
            <label><b>Login Admin</b></label>
            <input type="text" placeholder="Enter your login" name="login" required>
            <p>
            <label><b>Mdp Admin</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>
            </p>
            <input type="submit" name='submit' value='submit' >
         </form>

      </div>

   </body>

<?php
      // vérifie uniquement si les champs correspondent à " admin " au lieu de chercher user et mdp admin dans la BDD

      if(isset($_POST['login'])){
         $_POST["login"];
         $_POST["password"];

         if($_POST["login"] === 'admin' && $_POST["password"] === 'admin'){
            echo "<h1> Bienvenue Admin </h;>";
         } else {
            echo "<h1> Erreur </h1>";
         }
      }
?>

   </body>

    <!--
                si user admin connecté , alors lui afficher cette page , Elle permet
                de lister l’ensemble des informations des utilisateurs présents dans la base de
                données.
                                                                    -->

<!-- Include Footer.php -->
<?php include("footer.php") ?>