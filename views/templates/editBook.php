<div>
    <div class="ariane_section">
        <h1>Modifier les informations</h1>
    </div>

    <form action="index.php?action=editBook&id=<?= $book->getId() ?>" method="post" enctype="multipart/form-data">
        <div class="book_page">
            <img class="book_page_img" src="<?= $book->getImg() ?>" />
            <div class="book_page_info">
                <div class="labelField">
                    <label for="title">Titre :</label>
                    <input type="text" id="title" class="fieldForm" name="title" value="<?= $book->getTitle() ?>">
                </div>
                <div class="labelField">
                    <label for="name">Auteur :</label>
                    <input type="text" id="author" class="fieldForm" name="name" value="<?= $book->getName() ?>">
                </div>
                <div class="labelField">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" class="fieldForm"><?= $book->getDescription() ?></textarea>
                </div>
                <div class="labelField">
                    <label for="statut">Disponibilité :</label>
                    <select name="statut" id="availability" class="fieldForm">
                        <option value="Disponible" <?= ($book->getStatut() === 'Disponible' ? 'selected' : '') ?>>Disponible</option>
                        <option value="Indisponible" <?= ($book->getStatut() === 'Indisponible' ? 'selected' : '') ?>>Indisponible</option>
                    </select>
                </div>
                <div class="labelField">
                    <label for="image">Image du livre :</label>
                    <input type="file" name="image">
                </div>
                <button class="cta">Modifier le livre</button>
            </div>
        </div>
    </form>
</div>