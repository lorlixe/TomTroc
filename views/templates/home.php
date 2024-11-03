<div class="home">
    <div id="banner">
        <div id="banner-content">
            <h1>Rejoignez nos lecteurs passionnés </h1>
            <p id="banner-description">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
            <button class="cta">Découvrir</button>
        </div>
        <img id="banner-img" src="img/banner.jpeg" alt="bannière">
    </div>
    <div class="bookList">
        <h2>Les derniers livres ajoutés</h2>
        <div id="books">
            <?php foreach ($lastBooks as $book) { ?>
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
        <a href="index.php?action=all_books" class="cta">Voir tous les livres</a>

    </div>
    <div id="tuto_section">
        <div id="tudo_description">
            <h2>Comment ça marche ?</h2>
            <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
        </div>
        <div id="tuto_cards">
            <div class="tuto_card">
                Inscrivez-vous gratuitement sur
                notre plateforme.
            </div>
            <div class="tuto_card">
                Ajoutez les livres que vous souhaitez échanger à votre profil.
            </div>
            <div class="tuto_card">
                Parcourez les livres disponibles chez d'autres membres.
            </div>
            <div class="tuto_card">
                Proposez un échange et discutez avec d'autres passionnés de lecture.
            </div>
        </div>
        <a href="index.php?action=all_books" class="cta">Voir tous les livres</a>

    </div>

    <img id="home_img" src="img/minbanner.png" />
    <div id="valeur">
        <h2>Nos valeurs</h2>
        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.
            <br>
            <br>

            Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.
            <br>
            <br>


            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.
        </p>

    </div>
    <div id="signature">
        <p>L’équipe Tom Troc</p>

        <img src="img/coeur.png" />

    </div>
</div>