<?php
    if(session_id() == ''){
       session_start();
     }

    // if(isset($_GET['deco']) && $_GET['deco'] == 'deco'){
    //     session_destroy();
    //     header('Location: index.php');
    // } 
?>

<header>

    <h1 class="Module"><img src="MD.png"></h1>
<hr>
    <nav class="header">
        <ul class="list1">      
            <?php
                // if(isset($_SESSION['login']) == 'admin'){
                //     exit
            ?>

                <a href="index.php">
                <img src="Accueil.png">
                </a>

                <a href="admin.php">
                <img src="admin.png">
                </a>


            <?php
                // } elseif(isset($_SESSION['login'])){
                //     exit 
            ?>

                <a href="profil.php">
                <img src="Profil.png">
                </a>
                
                <a href="">
                <img src="Déconnexion.png">
                </a>

            <?php
                // } else{
                //     exit 
            ?>

                <a href="inscription.php">
                <img src="Inscription.png">
                </a>

                <a href="connexion.php">
                <img src="Connexion.png">
                </a>
                
            <?php
                // }
            ?> 
        </ul>
    </nav>
</header>