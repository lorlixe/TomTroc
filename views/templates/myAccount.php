<?php
// Date de création
$creation_date = new DateTime($user->getCreationDate());

// Date actuelle
$current_date = new DateTime(); // Par défaut, cela utilise la date et l'heure actuelles

// Calculer la différence
$interval = $creation_date->diff($current_date);

?>
<div id="my-account">
    <h1>Mon compte</h1>
    <div class="user-btn">
        <a class="cta cta-user" href="index.php?action=newBookForm">Ajouter un livre</a>
    </div>
    <div class="user-detail">
        <div class="user-description">
            <div class="user-descrption-photo">
                <?php if ($user->getUserPhoto() != ""): ?>
                    <img class="user_profil_img" src=<?= $user->getUserPhoto() ?> />
                <?php else: ?>
                    <img class="user_profil_img" src="img/blank-profile-picture.png" />
                <?php endif; ?>
                <a id="uploadLink" class="link" href="#">modifier</a>
                <form id="uploadForm" action="index.php?action=updateUserImg" method="POST" enctype="multipart/form-data" style="display: none;">
                    <input type="file" id="fileInput" name="image" accept="image/*" onchange="document.getElementById('uploadForm').submit();">
                    <button class="link">Enregistrer</button>

                </form>
            </div>
            <hr>

            <div id="display-user-information">
                <div class="display-user-information-section">
                    <h2><?= $user->getNickname() ?></h2>
                    <div id="member-year">Membre depuis <?= $interval->y ?> ans</div>
                </div>
                <div class="display-user-information-section">
                    <h3>BIBLIOTHEQUE</h3>
                    <div id="member-book-number"> <img src="img/icon_livre.png" /> <?= count($books) ?> Livres</div>
                </div>
            </div>


        </div>
        <div class="user-information">
            <h3>Vos informations personnelles</h3>


            <div class="formGrid">

                <div>
                    <form action="index.php?action=updateUser" method="post">
                        <div class="labelField">
                            <label for="nickname">Pseudo</label>
                            <input type="text" id="nickname" name="nickname" class="fieldForm" value="<?= $user->getNickname() ?>" required>

                        </div>
                        <div class="labelField">
                            <label for="login">Email</label>
                            <input type="text" name="email" id="email" class="fieldForm" value="<?= $user->getEmail() ?>" required>
                        </div>
                        <div class="labelField">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="fieldForm" required>
                        </div>
                        <button class="cta cta-user">Enregistrer</button>

                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="user-book">
        <div class="user-article">
            <div class="bookLine header">
                <div>PHOTO</div>
                <div>TITRE</div>
                <div>AUTEUR</div>
                <div>DESCRIPTION</div>
                <div>DISPONIBILITE</div>
                <div>ACTION</div>
            </div>

            <?php foreach ($books as $book) { ?>
                <div class="bookLine">
                    <img class="user_book_img" src="<?= $book->getImg() ?>" />
                    <div class="title"><?= $book->getTitle() ?></div>
                    <div class="title"><?= $book->getName() ?></div>
                    <div class="title"><?= $book->getDescription() ?></div>
                    <div class="title">
                        <?php if ($book->getStatut() === 'Disponible') { ?>
                            <span class="disponible">disponible</span>
                        <?php } else { ?>
                            <span class="non-dispo">non dispo.</span>
                        <?php } ?>
                    </div>
                    <div class="title">
                        <a class="link edit" href="index.php?action=bookForm&id=<?= $book->getId() ?>">Éditer</a>
                        <a class="link supp" href="index.php?action=deleteBook&id=<?= $book->getId() ?>"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



</div>
</div>
</div>
<script>
    // Ajouter un événement au clic sur le lien
    document.getElementById('uploadLink').addEventListener('click', function(e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien
        document.getElementById('fileInput').click(); // Simule un clic sur le champ de fichier
    });
</script>