<?php

class BookManager extends AbstractEntityManager
{
    /**
     * Récupère tous les livres.
     * @return array : un tableau d'objets Book.
     */
    public function getAllBook(): array
    {
        $sql = "SELECT book.*, author.name, book_library_relation.library_id, library.user_id, user.nickname FROM book 
    INNER JOIN author ON author.id = book.author_id 
    INNER JOIN book_library_relation ON book_library_relation.book_id = book.id
    INNER JOIN library ON library.id = book_library_relation.library_id
    INNER JOIN user ON user.id = library.user_id 
    ;";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    public function getLastBook(): array
    {
        $sql = "SELECT book.*, author.name, book_library_relation.library_id, library.user_id, user.nickname FROM book 
    INNER JOIN author ON author.id = book.author_id 
    INNER JOIN book_library_relation ON book_library_relation.book_id = book.id
    INNER JOIN library ON library.id = book_library_relation.library_id
    INNER JOIN user ON user.id = library.user_id 
    ORDER BY book.id DESC LIMIT 4;";
        $result = $this->db->query($sql);
        $lastbooks = [];

        while ($lastbook = $result->fetch()) {
            $lastbooks[] = new Book($lastbook);
        }

        return $lastbooks;
    }

    public function getBookById(int $id): ?Book
    {
        $sql = "SELECT 
        book.*, 
        author.name,
        book_library_relation.library_id, 
        library.user_id, 
        user.nickname,
        user.user_photo 
    FROM 
        book 
    JOIN 
        author ON book.author_id = author.id
    JOIN 
        book_library_relation ON book.id = book_library_relation.book_id
    JOIN 
        library ON book_library_relation.library_id = library.id
    JOIN 
        user ON library.user_id = user.id
    WHERE 
        book.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }


        return null;
    }
}
