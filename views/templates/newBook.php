<div>
    <div class="ariane_section">
        <h1>Modifier les informations</h1>
    </div>

    <form action="index.php?action=editBook" method="post" enctype="multipart/form-data">
        <input type="hidden" name="book_id" ">
        <div class=" book_page">
        <div class="book_page_info">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title"">

                    <label for=" name">Auteur :</label>
            <input type="text" id="author" name="name" ">

                    <label for=" description">Description :</label>
            <textarea id="description" name="description"></textarea>
            <label for="statut">Disponibilité :</label>

            <select name="statut" id="availability">
                <option value="disponible">Disponible</option>
                <option value="indisponible">Indisponible</option>
            </select>
            <label for="image">Image du livre :</label>
            <input type="file" id="img" name="image">

            <button type="submit">Modifier le livre</button>
        </div>
</div>
</form>
</div>