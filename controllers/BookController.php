<?php

class BookController
{
    public function allBook(): void
    {

        $bookManager = new bookManager();
        $books = $bookManager->getAllBook();

        $view = new View("livres");
        $view->render("allBooks", ['books' => $books]);
    }
    public function lastBook(): void
    {
        $bookManager = new bookManager();
        $lastBooks = $bookManager->getLastBook();
        if (isset($_SESSION['user'])) {
            $messageController = new MessageController;
            $messageController->unreadBook();
        }

        $view = new View("Accueil");
        $view->render("home", ['lastBooks' => $lastBooks]);
    }
    public function BookById(): void
    {
        $id = Utils::request("id");

        $bookManager = new bookManager();
        $book = $bookManager->getBookById($id);
        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }
        $view = new View("livre");
        $view->render("detail", ['book' => $book]);
    }

    public function bookForm(): void
    {
        $id = Utils::request("id", -1);


        Utils::checkUserOwnership($id);

        $bookManager = new bookManager();
        $book = $bookManager->getBookById($id);
        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }

        $view = new View("editBook");
        $view->render("editBook", ['book' => $book]);
    }

    public function newBookForm(): void
    {
        $view = new View("newBook");
        $view->render("newBook");
    }
    public function searchBooks(): void
    {
        $title = Utils::request("title");

        $bookManager = new bookManager();
        $book = $bookManager->getBookByTitle($title);
        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }
        $view = new View("livre");
        $view->render("allBooks", ['books' => $book]);
    }
}
