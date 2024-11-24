<div class="add-book">
    <h1>Ajouter un livre</h1>
    <div class="formGrid">
        <form action="index.php?action=editBook" method="post" enctype="multipart/form-data">
            <input type="hidden" name="book_id" ">
            <div class=" add-page-info">
            <div class="labelField">
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" class="fieldForm">
            </div>
            <div class="labelField">
                <label for=" name">Auteur :</label>
                <input type="text" id="author" name="name" class="fieldForm">
            </div>
            <div class="labelField">
                <label for=" description">Description :</label>
                <textarea id="description" name="description" class="fieldForm"></textarea>
            </div>
            <div class="labelField">
                <label for="statut">Disponibilité :</label>
                <select name="statut" id="availability" class="fieldForm">
                    <option value="Disponible">Disponible</option>
                    <option value="Indisponible">Indisponible</option>
                </select>
            </div>
            <div class="labelField">
                <label for="image">Image du livre :</label>
                <input type="file" id="img" name="image" class="fieldForm">
            </div>
            <button class="cta">Ajoute un livre</button>
    </div>
    </form>
</div>
</div>