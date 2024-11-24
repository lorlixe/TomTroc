<?php

/**
 * Template pour afficher une page d'erreur.
 */
?>

<div id="error">

    <h2>Erreur</h2>
    <div id="error-description">
        <p class=""><?= $errorMessage ?></p>
        <a href="index.php?action=home" class="link">Retour à la page d'accueil</a>
    </div>

</div>