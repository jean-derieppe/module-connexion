<?php
   session_start();
   require_once("header.php");
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

         <h2>Bienvenue à vous, Connectez-Vous :</h2>

      <!--    Formulaire de connexion -->

         <form action="connexion.php" method="post">
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
</html>

<?php
         //Requête pour chercher les données en bdd 
         if (isset($_POST["submit"])){
            $login=$_POST["login"];
            $password=$_POST["password"];
         
            if($login && $password !== ""){
               $requete = "SELECT count(*) FROM utilisateurs where login = '".$login."'";
               $exec_requete = $conn -> query($requete);
               $reponse      = mysqli_fetch_array($exec_requete);
               $count = $reponse['count(*)'];
               echo "login vérifié";

               if($count!=0){ // nom d'utilisateur correct
                  $requete = "SELECT password FROM utilisateurs where password = '".$password."'";
                  $exec_requete = $conn -> query($requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                  $password_hash = $reponse['password'];
                  echo " <h1> connexion réussie </h1>";
                  
                  if (password_verify($password, $password_hash)) { //si mot de passe correct
                     // stockage des infos de l'utilisateur dans des variables session
                     $requete = "SELECT login password FROM utilisateurs where login = '".$login."'";
                     $exec_requete = $conn -> query($requete);
                     $reponse      = mysqli_fetch_array($exec_requete);
                     $_SESSION['login'] = $login;
                     $_SESSION['password'] = $reponse['password'];
                     echo "<h1>Bravo vous êtes connecté validé</h1>";
                  }else{
                     echo "<h1>Tu est sur la Bonne voie </h1>";
                  }
               
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