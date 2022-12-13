<?php
   session_start();
   require ('header.php');
   require_once("Connect.php");

// si submit cliqué alors :
if (isset($_POST['submit'])){
   //vérifier que les infos sont remplies et définir leur variable
   if (isset($_POST["login"]) && isset($_POST['password'])){
      $login=$_POST["login"];
      $pass=$_POST["password"];
      $erreur = "";
   
      // si le champ de login et password valent admin alors, initié variable autoriser et location admin.php
      if($_POST["login"] == 'admin' && $_POST["password"] == 'admin'){
         $_SESSION['autoriser'] = 'oui';
         header ('Location: admin.php');
      }
      else{
      // requete pour trouver l'user ou l'user qui correspond aux champs entrées
      $req = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$pass' ");
      // compte le nombre de ligne correspondant à la requete, si resultat supérieur à 0 go profil.php
      $result_ligne = mysqli_num_rows($req);
         if ($result_ligne > 0){
            header ('Location: profil.php');
            $_SESSION['login'] = $login;
         // sinon erreur
         }else{
               $erreur ="<h1 class= 'erreur'>Login ou Password incorrect</h1>";
         }
      }
   }
}

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
            <br>
            <input type="submit" name='submit' value='submit' >
         </form>
         <?php
         // si la variable $erreur existe alors echo
         if(isset($erreur)){
            echo "$erreur";
         }
         ?>
         <hr>
         <p><strong>Pas de compte ? <a id="locate" href="inscription.php">Inscrivez-vous ici</a></strong></p>
         <hr class="hr1">
      </div>
   </body>

<?php
include("footer.php");
mysqli_close($conn);
?>