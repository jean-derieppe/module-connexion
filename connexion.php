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
         <input type="submit" name='submit' value='login' >
      </form>

         <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>

       <!--   Lorsque submit est validé, 
               Requête pour chercher les données en bdd , alors
               l’utilisateur est considéré comme connecté        -->

 
<!-- require('inscription.php');
if (isset($_REQUEST['name'], $_REQUEST['login'], $_REQUEST['password'])){
  $username = ($_REQUEST['name']);
  $email = ($_REQUEST['login']);
  $password = ($_REQUEST['password']);
  //requéte SQL + mot de passe crypté 
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    } -->

 <?php

      // session_start();
      // $login=$_POST["login"];
      // $pass=$_POST["password"];
      // $valider=$_POST["valider"];
      // $erreur="";
      // if(isset($valider)){
      //    include("connexion.php");
      //    // refaire le code ?


   // for ($login && $pass "vérifier s'il correspondent tous les deux aux même user de  la table ");

?>

   </div>
</body>
</html>
<!-- Include Footer.php -->
 <?php include("footer.php") ?>