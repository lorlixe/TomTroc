<div>
    <div class="ariane_section">
        <a class="ariane" href="index.php?action=home"> Nos livres > <?= $book->getTitle() ?></a>
    </div>

    <div class="book_page">

        <img class="book_page_img" src=<?= $book->getImg() ?> />
        <div class="book_page_info">
            <h1 id="book_page_title"><?= $book->getTitle() ?></h1>
            <p id="book_page_author">par <?= $book->getName() ?></p>
            <hr>

            <p class="book_page_text">DESCRIPTION</p>
            <p id="book_page_description"><?= $book->getDescription() ?></p>

            <p class="book_page_text">PROPRIÉTAIRE</p>
            <div class="user_profil">

                <?php if ($book->getUserPhoto() != ""): ?>
                    <img class="user_profil_img" src=<?= $book->getUserPhoto() ?> />
                <?php else: ?>
                    <img class="user_profil_img" src="img/blank-profile-picture.png" />
                <?php endif; ?>
                <p><?= $book->getNickname() ?></p>

            </div>
            <a href="" class="cta">Envoyer un message</a>

        </div>

    </div>
</div>