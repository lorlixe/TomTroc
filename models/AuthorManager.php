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
}
