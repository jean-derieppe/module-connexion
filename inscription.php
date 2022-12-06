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
                <label>Entrez votre Login</label>
                <input type="text" class="box-input" name="login" placeholder="Login" required /><br>
                <label>Entrez votre Mots de passe</label>
                <input type="password" class="box-input" name="password" placeholder="Password" required /><br>
                <label>Confirmez votre Mots de passe</label>
                <input type="password" name="repass" placeholder="Confirm password" required /><br>
                <input type="submit" name="submit" value="S'inscrire" class="box-button"/>
            </form>
        <hr>
        <!--  Si connecté , masquer l'onglet inscription  -->
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
       print_r($_POST);
    $user = 0;
        // si $pass vaut $repass alors
        if ($pass == $repass){
            // Variable qui défini la requête SQL
            $req_check_user = "SELECT login FROM utilisateurs";
            // Variable qui prépare et éxecute la requête défini plus haut vers la base de donnée 
            $req = $conn->query($req_check_user);

            // retourne tous les résultats de la reqûete $req dans un tableau 
            $result_user = $req->fetch_all();
            // $x = 0 si le tableau retourne un résultat alors incrémenter $x de 1 pour chaque résultat correspondant
            for($x = 0; isset($result_user[$x][0]); $x++){
                // si le résultat retourné par le tableau correspond à $_POST login
                if($result_user[$x][0] == $_POST['login']){
                    echo '<h1>Login déja existant</h1>';
                    // permet d'incrémenter $user si une correspondance est trouvé .
                    $user ++;
                }
            }
        // Si user vaut zéro alors
        if($user == 0){
            // créer la requête pour insérer dans utilisateurs, les valeurs login , prénom , nom et password)
            $req = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$pass')";
            // éxécution de la requête.
            $create = $conn->query($req);
            // Redirection vers la page connexion.php
            header ('Location: connexion.php');
        }
    
        }

    }

?>
<!-- Include Footer.php -->
<?php include("footer.php") ?>