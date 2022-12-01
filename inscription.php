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
        <p class="erreur">

        <!--  Formulaire d'inscription avec la method POST interet du champ Label ??????????? -->

        <form class="inscription" action="" method="post">  <!-- required vérifie que le champs n'est pas vide ? -->
            Entrez votre Nom
            <input type="text" class="box-input" name="name" placeholder="Name" style="width: 200px; height: 50px;" required /><br>
            Entrez votre Prénom
            <input type="text" class="box-input" name="surname" placeholder="Surname" style="width: 200px; height: 50px;" required /><br>
            Entrez votre Pseudo
            <input type="text" class="box-input" name="login" placeholder="Login" style="width: 200px; height: 50px;" required /><br>
            Entrez votre Mots de passe
            <input type="password" class="box-input" name="password" placeholder="Password" style="width: 200px; height: 50px;" required /><br>
            Confirmez votre Mots de passe
            <input type="password" name="repass" placeholder="Confirm password" style="width: 200px; height: 50px;" required /><br>
            <input type="submit" name="submit" value="S'inscrire" class="box-button"style="width: 150px; height: 50px;"/>

            <p>Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
        </form>

        <?php
            
        //On établit la connexion avec une requête mysqli en idiquant le chemin 
            $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');                                                                   

        // définition des variables ( elles ne sont pas obligatoire ) et condition pour Submit  
        //ou pour submit valeur non null ?
        if (isset($_POST["submit"])){
            $nom=$_POST["name"];
            $prenom=$_POST["surname"];
            $login=$_POST["login"];
            $pass=$_POST["password"];
            $repass=$_POST["repass"];

            // vérifie si les 2 MDP sont différent
            if ( $pass != $repass ){
                echo "Erreur, Mots de passe non similaire";
            } // pas la peine de préciser le $pass == $repass ?? )
                else if ( $pass == $repass ){
                // créer la requête pour insérer dans utilisateurs, les valeurs login , prénom , nom et password)
                    $req = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$pass')";
                // envoyer la requête
                    $create = $conn->query($req);
                // Redirection vers la page connexion.php
                    header ('Location: connexion.php');
                }
        }
        // // requête qui selectionne login dans utilisateurs
        // $req = "SELECT `login` FROM `utilisateurs`";
        // // envoyer la requête
        // $create = $conn->query($sql);   
        // if ($login existent en base de données ){
        //     echo "Login déja existant" ;
        // } 
        //     fetch all login ( pour verifier dans tous le tableau/champs/tables si le login est similaire ? )

?>
        </p>
    </div>
</body>
</html>

<!-- Include Footer.php -->
<?php include("footer.php") ?>