<?php

/**
 * Template pour afficher le formulaire de connexion.
 */
?>

<div class="connection-form">
    <form action="index.php?action=connectUser" method="post" class="foldedCorner">
        <h2>Connexion</h2>
        <div class="formGrid">
            <div>
                <div class="labelField">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="fieldForm" required>
                </div>
                <div class="labelField">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="fieldForm" required>
                </div>
                <button class="cta">Se connecter</button>
                <div class="sign">Pas de compte ?<a href="index.php?action=signUp"> Inscrivez-vous</a></div>
            </div>
        </div>

    </form>

    <img src="img/signIn.png" class="imgConnexion" alt="inscription">
</div>