<html>
 <head>
 <html lang="fr">
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 <title>Profil Utilisateur</title>
 </head>
 <!-- include Header.php -->
<?php include("header.php") ?>
<div class="div1">


<!--    Cette page possède un formulaire permettant à l’utilisateur de modifier ses
        informations. Ce formulaire est par défaut pré-rempli avec les informations qui
        sont actuellement stockées en base de données. 
                        
                    Afficher la page uniquement uniquement s'il est connecté ? -->

    <h1>Profil</h1>

    <p>
        Vous pouvez acceder à vos informations personnels et les modifiers autant de fois que vous le voudrez !
    </p>

    <form class="modification" action="" method="post">
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
        <input type="text" class="box-input" name="surname" placeholder="Prénom d'utilisateur" required />
        <input type="password" class="box-input" name="password" placeholder="Nouveau mot de passe" required />
        <input type="password" name="repass" placeholder="Confirmer nouveau mot de passe" required />
        <input type="submit" name="submit" value="Valider Modification" class="box-button" />

</div>
    <!-- Include Footer.php -->
    <?php include("footer.php") ?>