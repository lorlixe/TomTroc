<div id="all_books_page">
    <div class="all_books_page_header">
        <h1>Nos livres à l’échange</h1>
        <form action="index.php?action=searchBooks" method="POST">
            <div class="search-input-wrapper">
                <label for="search-value" class="visually-hidden">Rechercher un livre</label>
                <img src="./img/search-icon.svg" alt="Icône de recherche">
                <input type="text" id="search-value" name="title" placeholder="Rechercher un livre">
            </div>
            <input type="submit" value="Valider" class="all_books_page_submit_button" />
        </form>

    </div>
    <div id="books">
        <?php foreach ($books as $book) { ?>
            <a href="index.php?action=detail_books&id=<?= $book->getId() ?>">
                <article class="book_card">
                    <div class="card_img">
                        <img class="book_img" src=<?= $book->getImg() ?> />
                    </div>
                    <div class="book_description">
                        <div class="book_info">
                            <h3><?= $book->getTitle() ?></h3>
                            <p><?= $book->getName() ?></p>
                        </div>
                        <div class="saler">
                            <p>Vendu par :<?= $book->getNickname() ?></p>
                        </div>
                    </div>

                </article>
            </a>
        <?php } ?>
    </div>
</div>