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
        case 'publicAccount':
            $userController = new userController();
            $userController->userPublicAccount();
            break;
        case 'searchBooks':
            $bookController = new BookController();
            $bookController->searchBooks();
            break;
            // Section admin & connexion. 
        case 'signIn':
            $userController = new userController();
            $userController->displaysignInForm();
            break;
        case 'signUp':
            $userController = new userController();
            $userController->displaysignUpForm();
            break;

        case 'connectUser':
            $userController = new userController();
            $userController->connectUser();
            break;
        case 'addUser':
            $userController = new userController();
            $userController->addUser();
            break;
        case 'updateUser':
            $userController = new userController();
            $userController->updateUserInfo();
            break;
        case 'disconnectUser':
            $userController = new userController();
            $userController->disconnectUser();
            break;
        case 'userAccount':
            $userController = new userController();
            $userController->userAccount();
            break;
        case 'updateUserImg':
            $userController = new userController();
            $userController->updateUserImg();
            break;
        case 'editBook':
            $bookController = new bookController();
            $bookController->updateOrCreatBook();
            break;
        case 'updateBookImg':
            $bookController = new bookController();
            $bookController->updateBookImg();
            break;

        case 'bookForm':
            $bookController = new BookController();
            $bookController->bookForm();
            break;
        case 'deleteBook':
            $bookController = new BookController();
            $bookController->deleteBook();
            break;
        case 'newBookForm':
            $bookController = new BookController();
            $bookController->newBookForm();
            break;
            ///////////////////message/////////////

        case 'allMessage';
            $messageController = new MessageController();
            $messageController->allMessage();
            break;
        case 'conversation';
            $messageController = new MessageController();
            $messageController->conversation();
            break;

        case 'newConversation';
            $messageController = new MessageController();
            $messageController->creatConversation();
            break;
        case 'newMessage';
            $messageController = new MessageController();
            $messageController->creatMessage();
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
