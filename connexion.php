<!-- include Header.php -->
<?php include("header.php") ?>

<!-- include Connect.php -->
<?php include("Connect.php") ?>

<html>
   <head>
      <html lang="fr">
      <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <title>Connexion</title>
   </head>

<body>
   <div class="div1">


      <h1>Page de Connexion</h1>

      <h2>Bienvenue à vous, Connectez-Vous :</h2>

   <!--    Formulaire de connexion -->

      <form action="connexion" method="post">
         <label><b>Login</b></label>
         <input type="text" placeholder="Enter your login" name="login" required>
         <p>
         <label><b>Mot de passe</b></label>
         <input type="password" placeholder="Enter your password" name="password" required>
         </p>
         <input type="submit" name='submit' value='submit' >
      </form>

         <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>

 <?php

      session_start();

      // $login=$_POST["login"];
      // $pass=$_POST["password"];
      // $submit=$_POST["submit"];
      // $erreur="";
      // if(isset($submit)){

         //Requête pour chercher les données en bdd 

         if (isset($_POST["submit"])){
            $login=$_POST["login"];
            $password=$_POST["password"];
            

            header ('Location: profil.php');
         }
   //       si le login et password existent en BDD, alors l'user est connecté

   // // for ($login && $pass "vérifier s'il existent tous les deux (aux même user) de  la table ");

?>

   </div>
</body>
</html>
<!-- Include Footer.php -->
 <?php include("footer.php") ?>