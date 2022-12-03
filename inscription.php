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
            <form class="inscription" action="inscription" method="post">  <!-- required vérifie que le champs n'est pas vide ? -->
                <b>Entrez votre Nom</b>
                <input type="text" class="box-input" name="name" placeholder="Name" style="width: 200px; height: 50px;" required /><br>
                <b>Entrez votre Prénom</b>
                <input type="text" class="box-input" name="surname" placeholder="Surname" style="width: 200px; height: 50px;" required /><br>
                <b>Entrez votre Pseudo</b>
                <input type="text" class="box-input" name="login" placeholder="Login" style="width: 200px; height: 50px;" required /><br>
                <b>Entrez votre Mots de passe</b>
                <input type="password" class="box-input" name="password" placeholder="Password" style="width: 200px; height: 50px;" required /><br>
                <b>Confirmez votre Mots de passe</b>
                <input type="password" name="repass" placeholder="Confirm password" style="width: 200px; height: 50px;" required /><br>
                <input type="submit" name="submit" value="S'inscrire" class="box-button"style="width: 150px; height: 50px;"/>
            </form>
        <hr>
            <p>Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
        <hr>
        </div>
    </body>
</html>

<?php
                                                          
// définition des variables ( elles ne sont pas obligatoire ) et condition pour Submit 
if (isset($_POST["submit"])){
    $nom=$_POST["name"];
    $prenom=$_POST["surname"];
    $login=$_POST["login"];
    $pass=$_POST["password"];
    $repass=$_POST["repass"];
        
    // si eglité des $pass alors vérifier si le $login existent
    if ( $pass == $repass ){
        $req = "SELECT count(*) FROM utilisateurs where login = '".$login."'";
        $exec_requete = $conn -> query($req);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        //s'il n'existe pas alors
        if ($count == 0){
            // créer la requête pour insérer dans utilisateurs, les valeurs login , prénom , nom et password)
            $req = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$pass')";
            // envoyer la requête
            $create = $conn->query($req);
            // Redirection vers la page connexion.php
            header ('Location: connexion.php');
        }
        else{
            echo "<h1>Login déja existant<h1>";
        }
    }
    else{
        echo "<h1>Mots de passe nom similaire.<h1>";
    }
}
mysqli_close($conn); 

?>
<!-- Include Footer.php -->
<?php include("footer.php") ?>