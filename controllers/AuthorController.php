<?php

class AuthorController
{
    public function allAuthor(): void
    {
        $authorManager = new AuthorManager();
        $author = $authorManager->getAllAuthor();
        // $view = new View("Accueil");
        // $view->render("home", ['authors' => $author]);
    }
}
