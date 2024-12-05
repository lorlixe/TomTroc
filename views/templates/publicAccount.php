<?php
// Date de création
$creation_date = new DateTime($user->getCreationDate());

// Date actuelle
$current_date = new DateTime(); // Par défaut, cela utilise la date et l'heure actuelles

// Calculer la différence
$interval = $creation_date->diff($current_date);

?>
<div id="pulic-account">

    <div class="user-detail">
        <div class="public-user-description">
            <div class="user-descrption-photo">
                <?php if ($user->getUserPhoto() != ""): ?>
                    <img class="user_profil_img" src=<?= $user->getUserPhoto() ?> />
                <?php else: ?>
                    <img class="user_profil_img" src="img/blank-profile-picture.png" />
                <?php endif; ?>
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
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?action=newConversation&receiver_id=<?= $user->getId() ?>" class="cta cta-user">Écrire un message</a>
            <?php endif; ?>

        </div>

    </div>

    <div class="user-book">
        <div class="public-user-article">
            <div class="bookLine header bookLine-pulic-account">
                <div>PHOTO</div>
                <div>TITRE</div>
                <div>AUTEUR</div>
                <div>DESCRIPTION</div>
            </div>

            <?php foreach ($books as $book) { ?>

                <div class="bookLine bookLine-pulic-account">

                    <a href="index.php?action=detail_books&id=<?= $book->getId() ?>">
                        <img class="user_book_img" src="<?= $book->getImg() ?>" />
                    </a>
                    <a href="index.php?action=detail_books&id=<?= $book->getId() ?>">
                        <div class="title"><?= $book->getTitle() ?></div>
                    </a>
                    <div class="title"><?= $book->getName() ?></div>
                    <div class="title"><?= $book->getDescription() ?></div>
                </div>
            <?php } ?>
        </div>
    </div>



</div>
</div>
</div>