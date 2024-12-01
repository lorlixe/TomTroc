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
        user.user_photo,
        user.id 

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

    public function getBooksByUserId(int $id): array
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
        user.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }
    /**
     * Modifie un Livre.
     * @param book $book : l'book à modifier.
     * @return void
     */
    public function updateBook(Book $book): void
    {
        $sql = "UPDATE book SET title = :title, description = :description, img = :img, statut = :statut, author_id = :author_id WHERE id = :id";
        $this->db->query($sql, [
            'title' => $book->getTitle(),
            'description' => $book->getDescription(),
            'img' => $book->getImg(),
            'author_id' => $book->getAuthorId(),
            'statut' => $book->getStatut(),
            'id' => $book->getId()
        ]);
    }

    public function deleteBook(int $id): void
    {
        // Supprimez d'abord toutes les références dans la table `book_library_relation`
        $sql = "DELETE FROM book_library_relation WHERE book_id = :book_id";
        $this->db->query($sql, [':book_id' => $id]);

        // Ensuite, vous pouvez supprimer le livre dans `book`
        $sql = "DELETE FROM book WHERE id = :id";
        $this->db->query($sql, [':id' => $id]);
    }

    /**
     * Ajoute un book.
     * @param book $book : livre à ajouter.
     * @return void
     */
    public function addBook(Book $book): void
    {
        $user_id = $_SESSION['idUser'];

        // Requête préparée pour insérer un livre
        $sql1 = "INSERT INTO book (title, description, author_id, statut, img)
                  VALUES (:title, :description, :author_id, :statut, :img)";

        // Requête préparée pour créer la relation livre-bibliothèque
        $sql2 = "INSERT INTO book_library_relation (book_id, library_id)
                  VALUES (LAST_INSERT_ID(), (SELECT id FROM library WHERE user_id = :user_id))";

        $this->db->query($sql1, [
            'title' => $book->getTitle(),
            'description' => $book->getDescription(),
            'img' => $book->getImg(),
            'author_id' => $book->getAuthorId(),
            'statut' => $book->getStatut(),
        ]);
        $this->db->query($sql2, ['user_id' => $user_id]);
    }

    public function getBookByTitle(string $title): array
    {
        $sql = "SELECT 
        book.*, 
        author.name,
        book_library_relation.library_id, 
        library.user_id, 
        user.nickname,
        user.user_photo,
        user.id 

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
        book.title = :title";
        $result = $this->db->query($sql, ['title' => $title]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }
}
