<?php

/** 
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager
{
    /**
     * Récupère un user par son login.
     * @param string $login
     * @return ?User
     */
    public function getUserByLogin(string $login): ?User
    {
        $sql = "SELECT * FROM user WHERE login = :login";
        $result = $this->db->query($sql, ['login' => $login]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }
    public function setUser(User $user): void
    {
        $sql = "INSERT INTO user (login, password, nickname, user_photo) VALUES ( :login, :password, :nickname, :user_photo)";
        $this->db->query($sql, [
            'login' => $user->getLogin(),
            'password' => $user->getPassword(),
            'nickname' => $user->getNickname(),
            'user_photo' => $user->getUser_photo()
        ]);
    }
}
