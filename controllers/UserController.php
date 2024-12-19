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
    // public function checkIfUserIsConnected(): void
    // {
    //     // On vérifie que l'utilisateur est connecté.
    //     if (!isset($_SESSION['user'])) {
    //         Utils::redirect("signUp");
    //     }
    // }




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

        // On redirige vers la page home.
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
        $newUser = new User([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nickname' => $nickname,
            'user_photo' => $user_photo ?? "",
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
        Utils::checkIfUserIsConnected();


        // On redirige vers la page user.
        $view = new View("User");

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        $bookManager = new BookManager;
        $book = $bookManager->getBooksByUserId($_SESSION['idUser']);
        $view->render("myAccount", ['user' => $user, 'books' => $book]);;
    }

    public function updateUserInfo()
    {
        Utils::checkIfUserIsConnected();

        // On récupère les données du formulaire.
        $UserManager = new UserManager;

        $user = $UserManager->getUserById($_SESSION['idUser']);
        $email = Utils::request("email");
        $password = password_hash(Utils::request("password"), PASSWORD_DEFAULT);
        $nickname = Utils::request("nickname");
        $user->setNickname($nickname);
        $user->setPassword($password);
        $user->setEmail($email);
        $UserManager->modifyUser($user);


        $this->userAccount();
    }

    public function updateUserImg()
    {
        Utils::checkIfUserIsConnected();

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

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);
        // Vérifier si une ancienne image existe dans le dossier "img"
        if (!empty($user->getUserPhoto())) {
            $ancienneImage = $user->getUserPhoto();
            $cheminAncienneImage = $dossierDestination . basename($ancienneImage);

            if (file_exists($cheminAncienneImage)) {
                if (!unlink($cheminAncienneImage)) {
                    echo "Erreur : Impossible de supprimer l'ancienne image.";
                }
            }
        }
        $user->setUserPhoto($arrayBook["img"]);
        $UserManager->modifyUserPhoto($user);
        $this->userAccount();
    }

    public function userPublicAccount()
    {
        $id = Utils::request("id");

        // On redirige vers la page user.
        $view = new View("publicAccount");

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($id);
        $bookManager = new BookManager;
        $book = $bookManager->getBooksByUserId($id);
        $view->render("publicAccount", ['user' => $user, 'books' => $book]);;
    }
}
