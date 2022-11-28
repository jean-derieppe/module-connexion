<?

/*     Créer un Bouton deconnexion       */
   session_start();
   session_destroy();
   header("location:login.php");
?>
