<?php

/** 
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager
{
    /**
     * Récupère un user par son email.
     * @param string $email
     * @return ?User
     */
    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function getUserById(int $id): ?User
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function setUser(User $user): void
    {

        $sql = "INSERT INTO user (email, password, nickname, user_photo, creation_date) VALUES ( :email, :password, :nickname, :user_photo, :creation_date)";
        $this->db->query($sql, [
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'nickname' => $user->getNickname(),
            'user_photo' => $user->getUserPhoto(),
            'creation_date' => $user->getCreationDate()
        ]);

        // Création d'une bibliothèque
        $userId = $this->db->getPDO()->lastInsertId();

        // liée une bibliothèque pour cet utilisateur
        $insertLibraryQuery = "INSERT INTO library (user_id) VALUES (:user_id)";
        $this->db->query($insertLibraryQuery, [
            ':user_id' => $userId,
        ]);
    }
    public function modifyUser(User $user): void
    {
        $sql = "UPDATE user SET email =:email, password = :password, nickname = :nickname where id =:id";
        $this->db->query($sql, [
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'nickname' => $user->getNickname(),
            'id' => $user->getId(),
        ]);
    }
    public function modifyUserPhoto(User $user): void
    {
        $sql = "UPDATE user SET user_photo =:user_photo where id =:id";
        $this->db->query($sql, [
            'id' => $user->getId(),
            'user_photo' => $user->getUserPhoto(),
        ]);
    }
}
