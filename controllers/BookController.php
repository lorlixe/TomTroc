<?php

class BookController
{
    public function showHome(): void
    {

        $view = new View("Accueil");
        $view->render("home", []);
    }
}
