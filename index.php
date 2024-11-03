<?php

require_once 'config/_config.php';
require_once 'config/autoload.php';

$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
            // Pages accessibles à tous.
        case 'home':
            $bookController = new BookController();
            $bookController->lastBook();

            break;
        case 'all_books':
            $bookController = new BookController();
            $bookController->allBook();
            break;
        case 'detail_books':
            $bookController = new BookController();
            $bookController->BookById();
            break;
            // Section admin & connexion. 

        case 'signIn':
            $userController = new userController();
            $userController->displayConnectionForm();
            break;
        case 'connectionForm':
            $userController = new userController();
            $userController->displayConnectionForm();
            break;

        case 'connectUser':
            $userController = new userController();
            $userController->connectUser();
            break;

        case 'disconnectUser':
            $userController = new userController();
            $userController->disconnectUser();
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
