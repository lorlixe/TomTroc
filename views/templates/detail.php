<div>
    <div class="ariane_section">
        <a class="ariane" href="index.php?action=home"> Nos livres > <?= $book->getTitle() ?></a>
    </div>

    <div class="book_page">
        <img class="book_page_img" alt="<?= $book->getTitle() ?>" src=<?= $book->getImg() ?> />
        <div class="book_page_info">
            <h1 id="book_page_title"><?= $book->getTitle() ?></h1>
            <p id="book_page_author">par <?= $book->getName() ?></p>
            <hr>
            <p class="book_page_text">DESCRIPTION</p>
            <p id="book_page_description"><?= $book->getDescription() ?></p>
            <p class="book_page_text">PROPRIÉTAIRE</p>
            <a href="index.php?action=publicAccount&id=<?= $book->getUserId() ?>">
                <div class="user_profil">

                    <?php if ($book->getUserPhoto() != ""): ?>
                        <img class="user_profil_img" alt="user avatar" src=<?= $book->getUserPhoto() ?> />
                    <?php else: ?>
                        <img class="user_profil_img" alt="user avatar" src="img/blank-profile-picture.png" />
                    <?php endif; ?>
                    <p><?= $book->getNickname() ?></p>

                </div>
            </a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?action=newConversation&receiver_id=<?= $book->getUserId() ?>" class="cta">Envoyer un message</a>
            <?php endif; ?>
        </div>

    </div>
</div>