<html>
   <head>
      <html lang="fr">
      <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <title>Connexion</title>
   </head>
 <!-- include Header.php -->
<?php include("header.php") ?>
<body>
   <div class="div1">


      <h1>Page de Connexion</h1>

      <h2>Connectez-Vous :</h2>

   <!--    Formulaire de connexion -->

      <form action="connexion" method="post">
         <label><b>Nom d'utilisateur</b></label>
         <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
         <p>
         <label><b>Mot de passe</b></label>
         <input type="password" placeholder="Entrer le mot de passe" name="password" required>
         </p>
         <input type="submit" id='submit' value='login' >
      </form>
      <!--
         

         Code pour Vérifier si code incorrect seulement ? 

         <?php
         if(isset($_GET['erreur'])){
         $err = $_GET['erreur'];
         if($err==1 || $err==2)
         echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
         }
         ?>



      -->
         <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous ici</a></p>
      </form>

      <!--    requête pour chercher l'existance d'un user dans la base de donnée ? ( si dans historique de la base de données ( si compte inexistant l'indiquer ))  -->
   <?php
      try{
         $pdo=new PDO("mysql:host=localhost;dbname=moduleconnexion","utilisateur","1234");
      }
      catch(PDOException $e){
         echo $e->getMessage();
      }
   ?>

   <!-- Lorsque le formulaire
   est validé, s’il existe un utilisateur en bdd correspondant à ces informations, alors

   l’utilisateur est considéré comme connecté et une (ou plusieurs) variables de
   session sont créées. -->

   <?php
      session_start();
      @$login=$_POST["login"];
      @$pass=md5($_POST["pass"]);
      @$valider=$_POST["valider"];
      $erreur="";
      if(isset($valider)){
         include("connexion.php");
         $sel=$pdo->prepare("select * from utilisateurs where login=? and pass=? limit 1");
         $sel->execute(array($login,$pass));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
            " ".strtoupper($tab[0]["nom"]);
            $_SESSION["autoriser"]="oui";
            header("location:session.php");
         }
         else
            $erreur="Mauvais login ou mot de passe!";
      }
   ?>



   </div>
</body>
</html>
<!-- Include Footer.php -->
 <?php include("footer.php") ?>