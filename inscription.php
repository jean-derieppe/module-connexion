<!-- include Header.php -->
<?php include("header.php") ?>

<html>
 <head>
 <html lang="fr">
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 <title>Inscription</title>
 </head>
<body>
    <div class="div1">

    <h1 class="box-title">S'inscrire</h1>

    <!--  Formulaire d'inscription avec la method POST -->

    <form class="inscription" action="" method="post">                                          <!-- required vérifie que le champs n'est pas vide ? -->
        Entrez votre Nom
        <input type="text" class="box-input" name="name" placeholder="Name" style="width: 200px; height: 50px;" required /><br>
        Entrez votre Prénom
        <input type="text" class="box-input" name="surname" placeholder="Surname" style="width: 200px; height: 50px;" required /><br>
        Entrez votre Pseudo
        <input type="text" class="box-input" name="login" placeholder="Login" style="width: 200px; height: 50px;" required /><br>
        Entrez votre Mots de passe
        <input type="password" class="box-input" name="password" placeholder="Password" style="width: 200px; height: 50px;" required /><br>
        Confirmez votre Mots de passe
        <input type="password" name="confirmpassword" placeholder="Confirm password" style="width: 200px; height: 50px;" required /><br>
        <input type="submit" name="submit" value="S'inscrire" class="box-button"style="width: 150px; height: 50px;"/>
        <p>Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
    </form>

    <!--
            if isset $_post [Submit] 
            si résultat non nul et non existant en BDD alors "submit" vers la BDD 
                                                                                        -->


        <?php
            //Définir les variables ( pas obligatoire )  

            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On établit la connexion

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = new mysqli($servername, $username, $password);
            
            //On vérifie la connexion avec die ou un echo
            
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';
            
        ?>

    <!--
                if isset $_post [Submit] ( si submit remplis alors envoyer ) 

        condition Si tous les champs sont valides, on vérifie d'abord si le login ( et les compte n'existe pas déjà dans la base de donnée. Si non alors
    les informations de l'utilisateur seront placées dans la table "utilisateurs" vue dans la page précédente dont voici la structure: -->

    <?php
/*

        /*    
    session_start();
    $nom=$_POST["username"];
    $prenom=$_POST["surname"];
    $login=$_POST["login"];
    $pass=$_POST["password"];
    $repass=$_POST["repass"];

 /*   if   */
 
 /* ( empty vérifie si le champs est remplis ? )
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

                // pas de PDO // 

                $ins=$pdo->prepare("insert into utilisateurs(nom,prenom,login,pass) values(?,?,?,?)");
                if($ins->execute(array($nom,$prenom,$login,md5($pass))))
                header("location:login.php");
            }   
        }
    }


                 Ajouter un User et ses données dans la BDD si inscription validé  .

        CREATE TABLE  `utilisateurs`  Lors de l'inscription 
        `id` int(10) unsigned NOT NULL auto_increment,
        `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
        `nom` varchar(40) NOT NULL,
        `prenom` varchar(40) NOT NULL,
        `login` varchar(40) NOT NULL,
        `pass` varchar(40) NOT NULL,
        PRIMARY KEY (`id`)
        );    -->

 */

?>
<!--                           OU                   -->


<?php
/*
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire ???
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire ????
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

*/
?>

    </div>
</body>
</html>

<!-- Include Footer.php -->

<?php include("footer.php") ?>