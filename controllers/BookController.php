<?php

class BookController
{
    public function allBook(): void
    {

        $bookManager = new bookManager();
        $books = $bookManager->getAllBook();
        // $authorManager = new AuthorManager();
        // $author = $authorManager->getAllAuthor();
        $view = new View("Accueil");
        $view->render("home", ['books' => $books]);
    }
    public function lastBook(): void
    {
        $bookManager = new bookManager();
        $lastBooks = $bookManager->getLastBook();
        $view = new View("Accueil");
        $view->render("home", ['lastBooks' => $lastBooks]);
    }
}
