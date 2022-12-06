<?php
   session_start();
   include("header.php");
   require_once("Connect.php");
?>
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

            <h1 class="box-title">Inscription en date du <?php echo date('d/m/Y') ?></h1>
            
            <p>
                <h1>Veuillez renseigner les informations suivantes</h1>
            </p>
            <!--  Formulaire d'inscription avec la method POST interet du champ Label ??????????? -->
            <form class="inscription=" action="" method="post">  <!-- required vérifie que le champs n'est pas vide ? -->
                <label>Entrez votre nom</label>
                <input type="text" class="box-input" name="name" placeholder="Name" required /><br>
                <label>Entrez votre Prénom</label>
                <input type="text" class="box-input" name="surname" placeholder="Surname" required /><br>
                <label>Entrez votre Pseudo</label>
                <input type="text" class="box-input" name="login" placeholder="Login" required /><br>
                <label>Entrez votre Mots de passe</label>
                <input type="password" class="box-input" name="password" placeholder="Password" required /><br>
                <label>Confirmez votre Mots de passe</label>
                <input type="password" name="repass" placeholder="Confirm password" required /><br>
                <input type="submit" name="submit" value="S'inscrire" class="box-button"/>
            </form>
        <hr>
            <p>Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
        <hr>
        </div>
    </body>
</html>

<?php
                                                          
    // définition des variables et condition pour Submit 
    if (isset($_POST["submit"])){
        $nom=$_POST["name"];
        $prenom=$_POST["surname"];
        $login=$_POST["login"];
        $pass=$_POST["password"];
        $repass=$_POST["repass"];

        if ( $pass == $repass){


        
        }else{
            echo "<h1> Password non similaire </h1>";
        }

    }


























        // si eglité des $pass alors vérifier si le $login existent
    //     if ( $pass == $repass ){
    //         $req = "SELECT * FROM utilisateurs where login = '$login'";
    //         $exec_requete = $conn -> query($req);
    //         $reponse = mysqli_fetch_array($exec_requete);
    //         echo $reponse[0][0];
    //       //  $pass = $reponse['login'];

    //         //si la réponse correspond à $login alors .
    //         if ($reponse !== $login ){
    //             // créer la requête pour insérer dans utilisateurs, les valeurs login , prénom , nom et password)
    //             $req = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$pass')";
    //             // envoyer la requête
    //             $create = $conn->query($req);
    //             // Redirection vers la page connexion.php
    //             header ('Location: connexion.php');
    //         }
    //         else{
    //             echo "<h1>Login déja existant<h1>";
    //         }
    //     }
    //     else{
    //         echo "<h1>Mots de passe non similaire.<h1>";
    //     }
    // }


?>
<!-- Include Footer.php -->
<?php include("footer.php") ?>