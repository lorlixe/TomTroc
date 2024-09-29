<?php

class BookController
{
    public function allBook(): void
    {

        $bookManager = new bookManager();
        $book = $bookManager->getAllBook();
        $authorManager = new AuthorManager();
        $author = $authorManager->getAllAuthor();
        $view = new View("Accueil");
        $view->render("home", ['books' => $book, 'authors' => $author]);
    }
}
