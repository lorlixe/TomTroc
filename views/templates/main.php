<?php

/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.  
 * 
 * Les variables qui doivent impérativement être définie sont : 
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page. 
 */

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <header>
        <nav>
            <a href="index.php?action=home"> <img id="logo" src="img/logo.png" alt="logo"></a>
            <div id="menu">
                <div class="sous_menu">
                    <li> <a href="index.php?action=home">Accueil</a>
                    </li>
                    <li> <a href="index.php?action=all_books">Nos livres à l’échange</a>
                    </li>
                </div>
                <div class="sous_menu">
                    <?php
                    // Si on est connecté, on affiche les boutons suivant, sinon, on affiche le bouton de connexion : 
                    if (isset($_SESSION['user'])) {
                        echo '<li><img src="img/IconMessagerie.png" alt=""><a href="index.php?action=conversation"> Messagerie</a>';
                        if (isset($_SESSION['undreadBook'])) {
                            echo '<span class="notification-message">' . $_SESSION['undreadBook'] . '</span>';
                        }
                        echo '</li>';

                        echo '<li><img src="img/Icon_mon_compte.png" alt=""><a href="index.php?action=userAccount">Mon compte</a></li>';
                        echo '<li><a href="index.php?action=disconnectUser">Déconnexion</a></li>';
                    } else {
                        echo '<li><img src="img/IconMessagerie.png" alt=""><a href="index.php?action=signIn"> Messagerie</a></li>';
                        echo '<li><img src="img/Icon_mon_compte.png" alt=""><a href="index.php?action=signIn">Mon compte</a></li>';
                        echo '<li><a href="index.php?action=signIn">Connexion</a></li>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <p>Politique de confidentialité</p>
        <p>Mentions légales</p>
        <p>Tom Troc©</p>
        <img src="img/minilogo.png" alt="">
    </footer>

</body>

</html>