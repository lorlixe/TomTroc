<?php

/**
 * Template pour afficher le formulaire de connexion.
 */
?>

<div class="connection-form">
    <form action="index.php?action=connectUser" method="post" class="foldedCorner">
        <h2>S'inscrire</h2>
        <div class="formGrid">
            <form action="inscription.php" method="post" enctype="multipart/form-data">
                <label for="login">Nom d'utilisateur :</label><br>
                <input type="text" id="login" name="login" required><br><br>

                <label for="nickname">nickname :</label><br>
                <input type="text" name="nickname" id="nickname" required>

                <label for="password">Mot de passe :</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <label for="file">Téléchargez une photo de profil :</label><br>
                <input type="file" id="file" name="profile_image" accept="image/*"><br><br>

                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </form>
</div>