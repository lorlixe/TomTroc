<?php

class AuthorManager extends AbstractEntityManager
{
    /**
     * Récupère tous les livres.
     * @return array : un tableau d'objets Book.
     */

    public function getAllAuthor(): array
    {
        $sql = "SELECT * FROM author";
        $result = $this->db->query($sql);
        $authors = [];
        while ($author = $result->fetch()) {
            $authors[] = new Author($author);
        }
        return $authors;
    }

    public function addAuthor(Author $author): int
    {
        // Vérifier si l'auteur existe déjà dans la base de données
        $sql = "SELECT id FROM author WHERE UPPER(name) = UPPER(:name)";
        $result = $this->db->query($sql, [':name' => $author->getName()]);

        if ($result->rowCount() === 0) { // Si l'auteur n'est pas trouvé
            // Insérer le nouvel auteur
            $sql = "INSERT INTO author (name) VALUES (:name)";
            $this->db->query($sql, [':name' => $author->getName()]);

            // Récupérer l'ID de l'auteur inséré en le recherchant à nouveau
            $sql = "SELECT id FROM author WHERE UPPER(name) = UPPER(:name)";
            $result = $this->db->query($sql, [':name' => $author->getName()]);
        }

        // Récupérer et retourner l'ID de l'auteur, qu'il soit existant ou nouvellement inséré
        $authorId = $result->fetchColumn();
        return (int)$authorId;
    }
}
