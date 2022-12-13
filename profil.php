<?php
session_start();
if($_SESSION['login'] == 'admin' ){
    header('location: admin.php');
}
require_once("header.php");
require_once("Connect.php");
?>

<html>
 <head>
 <html lang="fr">
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 <title>Profil Utilisateur</title>
 </head>
 
    <div>

        <h1><strong>Profil</strong></h1>

        <p>    
            <h1>Bonjour <?php echo $_SESSION['login'] ?></h1>
            Vous pouvez acceder à vos informations personnels et les modifiers autant de fois que vous le voudrez !<br>
            Afficher uniquement si User est Log <br>
            si modification apporté et enregistré, afficher message de validation.
        </p>

        <form class="modification" action="" method="post">
            <input type="text" class="box-input" name="name" placeholder="Name" required /><br>
            <input type="text" class="box-input" name="surname" placeholder="Surname" required /><br>
            <input type="text" class="box-input" name="login" placeholder="Login" required /><br>
            <input type="password" class="box-input" name="password" placeholder="Nouveau mot de passe" required /><br>
            <input type="password" name="repass" placeholder="Confirmer nouveau mot de passe" required /><br>
            <input type="submit" name="submit" value="Valider Modification" class="box-button" />
        </form>
        
    </div>
</html>

<?php
    if (isset($_POST["submit"])){
        $nom=$_POST["name"];
        $prenom=$_POST["surname"];
        $login=$_POST["login"];
        $pass=$_POST["password"];
        $repass=$_POST["repass"];
    
        if( $pass == $repass){
            echo 'o';
        }
    }
//     // $req = "UPDATE `utilisateurs` SET ,`login`='$login',`prenom`='$prenom',`nom`='$nom',`password`='$pass'";
//     //Préparation de la requête
//     $req = "UPDATE `utilisateurs` SET (`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$pass')";
//     // éxécution de la requête.
//     $create = $conn->query($req);
// echo "bienvenue sur ton profil $_POST ['login']";
?>
    <!-- Include Footer.php -->
    <?php include("footer.php") ?>