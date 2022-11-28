<html>
 <head>
 <html lang="fr">
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 <title>Inscription</title>
 </head>
<!-- include Header.php -->
 <?php include("header.php") ?>
 <div class="div1">

 <h1 class="box-title">S'inscrire</h1>
    <!--  Formulaire d'inscription  -->
    <form class="inscription" action="" method="post">
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
        <input type="text" class="box-input" name="surname" placeholder="Prénom d'utilisateur" required />
        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
        <input type="password" name="repass" placeholder="Confirmer Mot de passe" required />
        <input type="submit" name="submit" value="S'inscrire" class="box-button" />
        <p>Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
    </form>

    <!-- Le formulaire doit contenir l’ensemble des champs présents dans la table
    “utilisateurs” (sauf “id”) + une confirmation de mot de passe. Dès qu’un
    utilisateur remplit ce formulaire, les données sont insérées dans la base de
    données et l’utilisateur est redirigé vers la page de connexion. -->


    <!-- Lors de l'inscription, aucun champ ne doit être laissé vide et les champs "mot de passe" et "confirmation de mot de passe" doivent
    être identiques. Si tous les champs sont valides, on vérifie d'abord si le login n'existe pas déjà dans la base de donnée. Si non alors
    les informations de l'utilisateur seront placées dans la table "utilisateurs" vue dans la page précédente dont voici la structure: 

    CREATE TABLE  `utilisateurs`  Lors de l'inscription ???????!!!!!!!!!  (
    `id` int(10) unsigned NOT NULL auto_increment,
    `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    `nom` varchar(40) NOT NULL,
    `prenom` varchar(40) NOT NULL,
    `login` varchar(40) NOT NULL,
    `pass` varchar(40) NOT NULL,
    PRIMARY KEY (`id`)
    );    -->

    <!--  Code source de Inscription.php ( avec verification si les champs sont bien remplis . ) -->
    <?php
    session_start();
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$login=$_POST["login"];
    @$pass=$_POST["pass"];
    @$repass=$_POST["repass"];
    @$valider=$_POST["valider"];
    $erreur="";
    
    if(isset($valider)){
        if(empty($nom)) $erreur="Nom laissé vide!";
        elseif(empty($prenom)) $erreur="Prénom laissé vide!";
        elseif(empty($login)) $erreur="Login laissé vide!";
        elseif(empty($pass)) $erreur="Mot de passe laissé vide!";
        elseif($pass!=$repass) $erreur="Mots de passe non identiques!";
        else{
            include("connexion.php");
            $sel=$pdo->prepare("select id from utilisateurs where login=? limit 1");
            $sel->execute(array($login));
            $tab=$sel->fetchAll();
            if(count($tab)>0)
                $erreur="Login existe déjà!";
            else{
                $ins=$pdo->prepare("insert into utilisateurs(nom,prenom,login,pass) values(?,?,?,?)");
                if($ins->execute(array($nom,$prenom,$login,md5($pass))))
                header("location:login.php");
            }   
        }
    }
    ?>


<!--                           OU                   -->


<?php
/*
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
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
    }
}else{
    ?>

<!--        !!        FIN       !!          !!     FIN     !!          !!    FIN     !!      !!     -->
*/
?>




        <div class="erreur"><?php echo $erreur ?></div>
        <form name="fo" method="post" action="">
            <input type="text" name="nom" placeholder="Nom" value="<?php echo $nom?>" /><br />
            <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom?>" /><br />
    <input type="text" name="login" placeholder="Login" value="<?php echo $login?>" /><br />
            <input type="password" name="pass" placeholder="Mot de passe" /><br />
            <input type="password" name="repass" placeholder="Confirmer Mot de passe" /><br />
            <input type="submit" name="valider" value="S'authentifier" />
        </form>
    </body>
</div>
</html>

<!-- Include Footer.php -->
<?php include("footer.php") ?>