<?php
   session_start();
   require ('header.php');
   require_once("Connect.php");
?>

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

         <h2>Connectez-Vous :</h2>

      <!--    Formulaire de connexion -->

         <form action="" method="post">
            <label><b>Login</b></label>
            <input type="text" placeholder="Enter your login" name="login" required>
            <p>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>
            </p>
            <input type="submit" name='submit' value='submit' >
         </form>
         <hr>
            <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>
         <hr>
         </div>
   </body>


<?php

         //Requête pour chercher les données en bdd 
         if (isset($_POST["submit"])){
            $login=$_POST["login"];
            $password=$_POST["password"];
         
            if($login && $password != 0 ){
               $requete = "SELECT count(*) FROM utilisateurs where login = '".$login."'"; // rajouter le MDP dans la même ligne ? 
               $exec_requete = $conn -> query($requete);
               $reponse      = mysqli_fetch_array($exec_requete);
               $count = $reponse['count(*)'];

               if($count!=0){ // nom d'utilisateur correct
                  $req = "SELECT login FROM utilisateurs where password = '".$password."'";
                  $exec_req = $conn -> query($req);
                  $reponse      = mysqli_fetch_array($exec_req);
                  $password_hash = $reponse['password'];
               
               }else{
                  echo "<h1>Login ou ( password ) incorrect</h1>";
               }
            
            } else{
               echo "<h1>( Login ) ou password incorrect</h1>";
            }
         }

mysqli_close($conn); 

?>

<?php Include ("Footer.php") ?>