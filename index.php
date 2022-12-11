<!-- include Header.php -->
<?php include("header.php") ?>

<html>
    <head>
        <html lang="fr">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <title>Acceuil</title>
    </head>

<body>

    <div>
        <hr>
        <!-- Partie visible sur la page Accueil -->
        <h1><img src="Bienvenue.png"></h1>

        <p>
            <strong>Aujourd'hui nous somme le <h1><?php echo date('d/m/Y')?></h1></strong>
        </p>
    </div>

</body>
</html>

<!-- Include Footer.php -->
<?php include("footer.php") ?>