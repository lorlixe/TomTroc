<?php

class BookManager extends AbstractEntityManager
{
    /**
     * Récupère tous les livres.
     * @return array : un tableau d'objets Book.
     */
    public function getAllBook(): array
    {
        $sql = "SELECT * FROM book";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }
}
