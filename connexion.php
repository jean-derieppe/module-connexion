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
      
      <div>
         <hr>
         <h1>Page de Connexion</h1>

      <!--    Formulaire de connexion -->
      </div>
      <div id="Formulaire1">
         <form id="form" action="" method="post">
            <label><b>Login</b></label>
            <input type="text" placeholder="Enter your login" name="login" required>
            
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>
            <input type="submit" name='submit' value='submit' >
         </form>
         <hr>
         <p><strong>Pas de compte ?<a id="locate" href="inscription.php">Inscrivez-vous ici</a></strong></p>
         <hr>
      </div>
   </body>

<?php
  $user=0;

if (isset($_POST["login"]) && isset($_POST['password'])){
   $login=$_POST["login"];
   $pass=$_POST["password"];

   if($_POST["login"] === 'admin' && $_POST["password"] === 'admin'){
      header ('Location: admin.php');
   }
      else{
      // $req est le chemin défini pour chercher un user ou le login et password correspond
      $req = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$pass' ");
      // compte le nombre de ligne ou $login et $pass correspondent à la requete.
      $result_ligne = mysqli_num_rows($req);
      if($_POST["login"] === 'admin' && $_POST["password"] === 'admin'){
         header ('Location: admin.php');
      }
      else{
         if ($result_ligne > 0){
            header ('Location: profil.php');
            // header( 'location : profil.php ');
         }else{
            echo "<h1>compte inexistant ou erreur détecté</h1>";
            // header(' location : inscription.php');
         }
      }
   }
}

include("footer.php");
mysqli_close($conn);
?>