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


<!--    
        
        Cette page est uniquement visible si l'User posséde un compte et possède un formulaire permettant à l’utilisateur de modifier ses
        informations. 
        Ce formulaire doit être par défaut pré-rempli avec les informations de l'User actuel,
         qui sont actuellement stockées en base de données. 
                                                                            -->

    <h1>Profil</h1>

    <p>    
        Vous pouvez acceder à vos informations personnels et les modifiers autant de fois que vous le voudrez !<br>
        Afficher uniquement si User est Log <br>

        si modification apporté et enregistré, afficher message de validation .
    </p>

    <form class="modification" action="" method="post">
        <input type="text" class="box-input" name="username" placeholder="Nom" required /><br>
        <input type="text" class="box-input" name="surname" placeholder="Prénom" required /><br>
        <input type="password" class="box-input" name="password" placeholder="Nouveau mot de passe" required /><br>
        <input type="password" name="repass" placeholder="Confirmer nouveau mot de passe" required /><br>
        <input type="submit" name="submit" value="Valider Modification" class="box-button" />

</div>
    <!-- Include Footer.php -->
    <?php include("footer.php") ?>