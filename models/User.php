<?php

/**
 * Entité User : un user est défini par son id, un email et un password.
 */
class User extends AbstractEntity
{
    private string $email;
    private string $password;
    private string $nickname;
    private string $user_photo;
    private string $statut;
    private string $creation_date;


    /**
     * Setter pour le email.
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Getter pour le email.
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
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
    public function setUserPhoto(string $user_photo): void
    {
        $this->user_photo = $user_photo;
    }

    /**
     * Getter pour le user_photo.
     * @return string
     */
    public function getUserPhoto(): string
    {
        return $this->user_photo;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }
    public function getStatut(): string
    {
        return $this->statut;
    }
    public function getCreationDate(): string
    {
        return $this->creation_date;
    }

    public function setCreationDate(string $creation_date): void
    {
        $this->creation_date = $creation_date;
    }
}
