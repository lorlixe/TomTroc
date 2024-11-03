<?php

/**
 * Entité User : un user est défini par son id, un login et un password.
 */
class User extends AbstractEntity
{
    private string $login;
    private string $password;
    private string $nickname;
    private string $user_photo;





    /**
     * Setter pour le login.
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * Getter pour le login.
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Setter pour le password.
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Getter pour le password.
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Setter pour le nickname.
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * Getter pour le nickname.
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }
    /**
     * Setter pour le user_photo.
     * @param string $user_photo
     */
    public function setUser_photo(string $user_photo): void
    {
        $this->user_photo = $user_photo;
    }

    /**
     * Getter pour le user_photo.
     * @return string
     */
    public function getUser_photo(): string
    {
        return $this->user_photo;
    }
}
