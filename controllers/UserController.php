<?php

/**
 * Contrôleur de la partie admin.
 */

class UserController
{


    /**
     * Vérifie que l'utilisateur est connecté.
     * @return void
     */
    private function checkIfUserIsConnected(): void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['user'])) {
            Utils::redirect("signUp");
        }
    }

    /**
     * Affichage du formulaire de connexion.
     * @return void
     */
    public function displaysignInForm(): void
    {
        $view = new View("SignIn");
        $view->render("signIn");
    }

    /**
     * Affichage du formulaire d'inscription.
     * @return void
     */
    public function displaySignUpForm(): void
    {
        $view = new View("SignUp");
        $view->render("signUp");
    }

    /**
     * Connexion de l'utilisateur.
     * @return void
     */
    public function connectUser(): void
    {
        // On récupère les données du formulaire.
        $email = Utils::request("email");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        // On vérifie que l'utilisateur existe.
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        // On vérifie que le mot de passe est correct.
        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Le mot de passe est incorrect : $hash");
        }

        // On connecte l'utilisateur.
        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

        // On redirige vers la page d'administration.
        Utils::redirect("home");
    }

    /**
     * Création d'un utilisateur.
     * @return void
     */
    public function addUser(): void
    {
        // On récupère les données du formulaire.
        $email = Utils::request("email");
        $password = Utils::request("password");
        $nickname = Utils::request("nickname");

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
                // Définit le chemin complet pour enregistrer l'image
                $cheminComplet = $dossierDestination . $nomFichier;

                // Déplace le fichier depuis le dossier temporaire vers le dossier de destination
                if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminComplet)) {
                    $user_photo = $cheminComplet;
                } else {
                    echo "Erreur lors du téléchargement de l'image.";
                }
            } else {
                echo "Seules les images JPEG, PNG et GIF sont autorisées.";
            }
        } else {
            $cheminComplet = "img/blank-profile-picture.png";
        }

        // On vérifie que les données sont valides.
        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        // On vérifie que l'utilisateur existe.
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        if ($user) {
            throw new Exception("email déjà utilisé");
        }
        var_dump($_FILES[$user_photo]);
        $newUser = new User([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nickname' => $nickname,
            'user_photo' => $user_photo ?? null,
            'creation_date' => date('Y-m-d'),
        ]);

        $userManager->setUser($newUser);
        $this->connectUser();
    }


    /**
     * Déconnexion de l'utilisateur.
     * @return void
     */
    public function disconnectUser(): void
    {
        // On déconnecte l'utilisateur.
        unset($_SESSION['user']);

        // On redirige vers la page d'accueil.
        Utils::redirect("home");
    }

    public function userAccount()
    {
        $account = new UserController;
        $account->checkIfUserIsConnected();

        // On redirige vers la page user.
        $view = new View("User");

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        $bookManager = new BookManager;
        $book = $bookManager->getBooksByUserId($_SESSION['idUser']);
        $view->render("myAccount", ['user' => $user, 'books' => $book]);;
    }

    public function updateOrCreatBook(): void
    {
        $this->checkIfUserIsConnected();

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        // On récupère les données du formulaire.
        $id = Utils::request("id", -1);
        $title = Utils::request("title");
        $description = Utils::request("description");
        $statut = Utils::request("statut");
        $name = Utils::request("name");

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
                // Définit le chemin complet pour enregistrer l'image
                $cheminComplet = $dossierDestination . $nomFichier;

                // Déplace le fichier depuis le dossier temporaire vers le dossier de destination
                if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminComplet)) {
                    echo "Image téléchargée avec succès ";
                } else {
                    echo "Erreur lors du téléchargement de l'image.";
                }
                $arrayBook["img"] = $cheminComplet;
            } else {
                echo "Seules les images JPEG, PNG et GIF sont autorisées.";
            }
        }
        // else {
        //     $cheminComplet = "img/livre_sans_img.jpg";
        // }

        // On vérifie que les données sont valides.
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
            // echo "<pre>";
            // var_dump($book->getAuthorId());
            // exit;
            // echo "</pre>";
            $bookManager->updateBook($book);
        }


        // On redirige vers la page user.
        // $view = new View("myAccount");
        // $view->render("myAccount", ['user' => $user]);;
        $this->userAccount();
    }

    public function deleteBook(): void
    {
        $this->checkIfUserIsConnected();

        $id = Utils::request("id", -1);

        // On supprime l'article.
        $bookManager = new BookManager();
        $bookManager->deleteBook($id);

        // On redirige vers la page d'administration.

        $view = new View("User");

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        $bookManager = new BookManager;
        $book = $bookManager->getBooksByUserId($_SESSION['idUser']);
        $view->render("myAccount", ['user' => $user, 'books' => $book]);;
    }

    public function updateUserInfo()
    {
        $this->checkIfUserIsConnected();

        // On récupère les données du formulaire.
        $UserManager = new UserManager;

        $id = $UserManager->getUserById($_SESSION['idUser']);


        $email = Utils::request("email");
        $password = Utils::request("password");
        $nickname = Utils::request("nickname");

        $user = new User([
            'id' => $id,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nickname' => $nickname,
        ]);
        $updateUser = $UserManager->modifyUser($user);

        $view = new View("User");
        $view->render("home", ['user' => $updateUser]);
    }
}
