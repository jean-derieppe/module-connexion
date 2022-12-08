<!-- include Header.php -->
<?php 
session_start();
require ('header.php');
require_once("Connect.php");
?>

<html>
   <head>
      <html lang="fr">
      <meta charset="utf-8">
      <!-- importer le fichier de style -->
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <title>Admin</title>
   </head>

   <body>
      <div class="div1">
         <h1>Bienvenue Admin</h1>
         <br>
         <h2>Voici les infos des User inscrit en base de données.</h2>
         <br>
         <table border="3">
            <thead>

            <?php
            $request = $conn->query('select * from utilisateurs');
            $result = $request->fetch_array(MYSQLI_ASSOC);

            foreach($result = $request->fetch_array(MYSQLI_ASSOC) as $key => $value){
               echo '<th>' . $key . '</th>';
            }
            ?>
            </thead>

            <?php
               while($result != null){
                  echo '<tr>';
                  foreach($result as $value){
                     echo '<td>' . $value . '</td>';
                  }
                  $result = $request->fetch_array(MYSQLI_ASSOC);
                  echo '</tr>';
               }
            ?>
         </table>
      </div>
   </body>

    <!--
                si user admin connecté , alors lui afficher cette page , Elle permet
                de lister l’ensemble des informations des utilisateurs présents dans la base de
                données. et empecher d'accéder à l'url              -->

<!-- Include Footer.php -->
<?php
include("footer.php");
mysqli_close($conn);
?>