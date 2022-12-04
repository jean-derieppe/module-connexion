<?php
//Définir les variables ( pas obligatoire )  

$servername = 'localhost';
$username = 'root';
$password = '';
$bdd = 'moduleconnexion';

//On établit la connexion
$conn = new mysqli('localhost','root', '', 'moduleconnexion');
?>

<!--  disconnect ? session_destroy ?  importer uniquement dans inscription ou dans les page ayant une co avec sql ? -->