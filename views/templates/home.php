<div class="home">
    <div>Hello world</div>
    <div class="bookList">

        <?php foreach ($books as $book) { ?>
            <article class="article">
                <h2><?= $book->getTitle() ?></h2>
                <p><?= $book->getDescription() ?></p>
                <p><?= $book->getStatut() ?></p>
                <?php foreach ($authors as $author) { ?>
                    <?php if ($book->getAuthorId() === $author->getId()) { ?>
                        <p><?= $author->getName() ?></p>
                    <?php } ?>
                <?php } ?>

                <img src=<?= $book->getImg() ?> />


            </article>
        <?php } ?>
    </div>
</div>