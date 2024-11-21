<?php

/**
 * Template pour afficher le formulaire de connexion.
 */
?>

<div class="connection-form">
    <form action="index.php?action=addUser" method="post" class="foldedCorner" enctype="multipart/form-data">
        <h2>S'inscrire</h2>
        <div class="formGrid">
            <div>
                <div class="labelField">
                    <label for="email">Adresse email</label>
                    <input type="text" id="email" name="email" class="fieldForm" required>

                </div>
                <div class="labelField">
                    <label for="nickname">Pseudo</label>
                    <input type="text" name="nickname" id="nickname" class="fieldForm" required>
                </div>
                <div class="labelField">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="fieldForm" required>
                </div>
                <div class="labelField">
                    <label for="image">Photo de profil :</label>
                    <input type="file" name="image">
                </div>

                <button class="cta">S'inscrire</button>
                <div class="sign">Déjà inscrit ? <a href="index.php?action=signIn"> Connectez-vous ?</a></div>
            </div>
        </div>

    </form>
    <img src="img/signIn.png" class="imgConnexion" alt="inscription">

</div>