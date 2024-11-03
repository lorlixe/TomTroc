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
        $view = new View("Accueil");
        $view->render("home", ['lastBooks' => $lastBooks]);
    }
    public function BookById(): void
    {
        $id = Utils::request("id", -1);

        $bookManager = new bookManager();
        $book = $bookManager->getBookById($id);
        if (!$book) {
            throw new Exception("L'article demandé n'existe pas.");
        }
        $view = new View("livre");
        $view->render("detail", ['book' => $book]);
    }
}
