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
            $book = [];
        }
        $view = new View("livre");
        $view->render("allBooks", ['books' => $book]);
    }
    public function updateOrCreatBook(): void
    {
        Utils::checkIfUserIsConnected();

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        // On récupère les données du formulaire.
        $id = Utils::request("id", -1);
        $title = Utils::request("title");
        $description = Utils::request("description");
        $statut = Utils::request("statut");
        $name = Utils::request("name");


        if ($id != -1) {
            Utils::checkUserOwnership($id);
        }
        // Dossier de destination pour les images téléchargées
        $dossierDestination = "img/";


        // Vérifie si le dossier de destination existe, sinon le créer
        if (!is_dir($dossierDestination)) {
            mkdir($dossierDestination, 0777, true);
        }

        $arrayBook = [
            'id' => $id, // Si l'id vaut -1, le livre sera ajouté. Sinon, il sera modifié.
            'title' => $title,
            'description' => $description,
            'author_id' => "",
            'statut' => $statut,
        ];


        // Vérifie si un fichier a été envoyé et si le téléchargement a réussi
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Récupère les informations du fichier
            $nomFichier = str_replace(' ', '_', basename($_FILES['image']['name']));
            $tailleFichier = $_FILES['image']['size'];
            $typeFichier = mime_content_type($_FILES['image']['tmp_name']);

            // Limite les types de fichiers autorisés (uniquement images)
            $typesAutorises = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($typeFichier, $typesAutorises)) {
                // Chemin complet initial
                $cheminComplet = $dossierDestination . $nomFichier;

                // Vérifier si le fichier existe déjà
                $i = 1;
                $infoFichier = pathinfo($nomFichier); // Obtenir le nom et l'extension
                while (file_exists($cheminComplet)) {
                    // Renommer en ajoutant un suffixe numérique pour éviter les doublons
                    $nomFichier = $infoFichier['filename'] . '_' . $i . '.' . $infoFichier['extension'];
                    $cheminComplet = $dossierDestination . $nomFichier;
                    $i++;
                }

                // Déplace le fichier depuis le dossier temporaire vers le dossier de destination
                if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminComplet)) {
                    // Enregistrement réussi
                    $arrayBook["img"] = $cheminComplet;
                } else {
                    echo "Erreur lors du téléchargement de l'image.";
                }
            } else {
                echo "Seules les images JPEG, PNG et GIF sont autorisées.";
            }
        }





        if (empty($title) || empty($description) || empty($statut) || empty($name)) {
            throw new Exception("Tous les champs sont obligatoires");
        }
        $AuthorManager = new AuthorManager();
        $author = new Author(['name' => $name]);
        $arrayBook["author_id"] = $AuthorManager->addAuthor($author);


        // On crée l'objet Book.

        if ($id == -1) {
            // On ajoute le livre.
            $book = new Book($arrayBook);
            $bookManager = new BookManager();
            $bookManager->addBook($book);
        } else {
            // on modifie

            $bookManager = new BookManager();

            $book = $bookManager->getBookById($id);



            $book->setTitle($title);
            $book->setDescription($description);
            $book->setStatut($statut);
            $book->setAuthorId($arrayBook["author_id"]);
            if (!empty($arrayBook["img"])) {
                $book->setImg($arrayBook["img"]);
            }

            $bookManager->updateBook($book);
        }


        // On redirige vers la page d'administration.

        $view = new View("User");

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        $bookManager = new BookManager;
        $book = $bookManager->getBooksByUserId($_SESSION['idUser']);
        $view->render("myAccount", ['user' => $user, 'books' => $book]);
    }
    public function deleteBook(): void
    {
        Utils::checkIfUserIsConnected();
        $id = Utils::request("id", -1);
        Utils::checkUserOwnership($id);
        $dossierDestination = "img/";

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        // Vérifier si une ancienne image existe dans le dossier "img"
        if (!empty($book->getImg()) && $book->getImg() != "img/livre_sans_img.jpg") {
            $ancienneImage = $book->getImg();
            $cheminAncienneImage = $dossierDestination . basename($ancienneImage);

            if (file_exists($cheminAncienneImage)) {
                if (!unlink($cheminAncienneImage)) {
                    echo "Erreur : Impossible de supprimer l'ancienne image.";
                }
            }
        }
        // On supprime l'article.
        $bookManager->deleteBook($id);


        // On redirige vers la page d'administration.

        $view = new View("User");

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        $bookManager = new BookManager;
        $book = $bookManager->getBooksByUserId($_SESSION['idUser']);
        $view->render("myAccount", ['user' => $user, 'books' => $book]);
    }

    public function updateBookImg()
    {
        Utils::checkIfUserIsConnected();

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        // On récupère les données du formulaire.
        $id = Utils::request("id", -1);



        if ($id != -1) {
            Utils::checkUserOwnership($id);
        }

        // Dossier de destination pour les images téléchargées
        $dossierDestination = "img/";


        // Vérifie si le dossier de destination existe, sinon le créer
        if (!is_dir($dossierDestination)) {
            mkdir($dossierDestination, 0777, true);
        }
        // Vérifie si un fichier a été envoyé et si le téléchargement a réussi
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Récupère les informations du fichier
            $nomFichier = str_replace(' ', '_', basename($_FILES['image']['name']));
            $tailleFichier = $_FILES['image']['size'];
            $typeFichier = mime_content_type($_FILES['image']['tmp_name']);

            // Limite les types de fichiers autorisés (uniquement images)
            $typesAutorises = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($typeFichier, $typesAutorises)) {
                // Chemin complet initial
                $cheminComplet = $dossierDestination . $nomFichier;

                // Vérifier si le fichier existe déjà
                $i = 1;
                $infoFichier = pathinfo($nomFichier); // Obtenir le nom et l'extension
                while (file_exists($cheminComplet)) {
                    // Renommer en ajoutant un suffixe numérique pour éviter les doublons
                    $nomFichier = $infoFichier['filename'] . '_' . $i . '.' . $infoFichier['extension'];
                    $cheminComplet = $dossierDestination . $nomFichier;
                    $i++;
                }

                // Déplace le fichier depuis le dossier temporaire vers le dossier de destination
                if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminComplet)) {
                    // Enregistrement réussi
                    $arrayBook["img"] = $cheminComplet;
                } else {
                    echo "Erreur lors du téléchargement de l'image.";
                }
            } else {
                echo "Seules les images JPEG, PNG et GIF sont autorisées.";
            }
        }

        $bookManager = new BookManager();

        $book = $bookManager->getBookById($id);
        // Vérifier si une ancienne image existe dans le dossier "img"
        if (!empty($book->getImg()) && $book->getImg() != "img/livre_sans_img.jpg") {
            $ancienneImage = $book->getImg();
            $cheminAncienneImage = $dossierDestination . basename($ancienneImage);

            if (file_exists($cheminAncienneImage)) {
                if (!unlink($cheminAncienneImage)) {
                    echo "Erreur : Impossible de supprimer l'ancienne image.";
                }
            }
        }

        $book->setImg($arrayBook["img"]);
        $bookManager->updateBook($book);

        // On redirige vers la page d'administration.

        $view = new View("User");

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        $bookManager = new BookManager;
        $book = $bookManager->getBooksByUserId($_SESSION['idUser']);
        $view->render("myAccount", ['user' => $user, 'books' => $book]);
    }
}
