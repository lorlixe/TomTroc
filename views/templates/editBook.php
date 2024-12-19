<div class="edit">
    <div class="edit_book_title">
        <div class="ariane_section">
            <a class="ariane" href="index.php?action=userAccount">retour</a>
        </div>
        <h1>Modifier les informations</h1>
    </div>

    <div class="form_edit_book">
        <div class="edit_book_img_section">
            <span class="ariane">Photo</span>
            <img class="edit_book_img" name="img" alt="<?= $book->getTitle() ?>" src="<?= $book->getImg() ?>" />
            <a id="uploadLink" class="link" href="#">modifier la photo</a>
            <form id="uploadForm" action="index.php?action=updateBookImg&id=<?= $book->getId() ?>" method="POST" enctype="multipart/form-data" style="display: none;">
                <input type="file" id="fileInput" name="image" accept="image/*" onchange="document.getElementById('uploadForm').submit();">
                <button class="link">Enregistrer</button>

            </form>
        </div>
        <form action="index.php?action=editBook&id=<?= $book->getId() ?>" method="post" enctype="multipart/form-data">
            <div class="edit_book">

                <div class="edit_book_info">
                    <div class="labelField_edit_book">
                        <label for="title">Titre :</label>
                        <input type="text" id="title" class="fieldForm" name="title" value="<?= $book->getTitle() ?>">
                    </div>
                    <div class="labelField_edit_book">
                        <label for="name">Auteur :</label>
                        <input type="text" id="author" class="fieldForm" name="name" value="<?= $book->getName() ?>">
                    </div>
                    <div class="labelField_edit_book">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" class="fieldForm"><?= $book->getDescription() ?></textarea>
                    </div>
                    <div class="labelField_edit_book">
                        <label for="statut">Disponibilité :</label>
                        <select name="statut" id="availability" class="fieldForm">
                            <option value="Disponible" <?= ($book->getStatut() === 'Disponible' ? 'selected' : '') ?>>Disponible</option>
                            <option value="Indisponible" <?= ($book->getStatut() === 'Indisponible' ? 'selected' : '') ?>>Indisponible</option>
                        </select>
                    </div>
                    <!-- <div class="labelField_edit_book">
                    <label for="image">Image du livre :</label>
                    <input type="file" name="image">
                </div> -->
                    <button class="cta">Valider</button>
                </div>
            </div>
        </form>
    </div>

</div>
<script>
    // Ajouter un événement au clic sur le lien
    document.getElementById('uploadLink').addEventListener('click', function(e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien
        document.getElementById('fileInput').click(); // Simule un clic sur le champ de fichier
    });
</script>