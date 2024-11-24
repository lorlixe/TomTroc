<?php

/**
 * Entité Book, un livre est défini par les champs
 *  title, description, img, statut, author_id
 */
class Book extends AbstractEntity
{
    private string $title = "";
    private string $description = "";
    private string $img = "img/livre_sans_img.jpg";
    private string $statut = "";
    private int $author_id = 0;
    private string $name = "";
    private string $nickname = "";
    private string $user_photo = "";
    private int $user_id = 0;


    /**
     * Setter pour le titre.
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre.
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * Setter pour le description.
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Getter pour le description.
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Setter pour le img.
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * Getter pour le img.
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }


    /**
     * Setter pour le img.
     * @param string $img
     */
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    /**
     * Getter pour le statut.
     * @return string
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * Setter pour le author.
     * @param int $author
     */
    public function setAuthorId(int $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * Getter pour l'auteur.
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * setter pour vendeur.
     * @return string
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * Getter pour vendeur.
     * @return string
     */

    public function getNickname(): string
    {
        return $this->nickname;
    }
    /**
     * setter pour photo vendeur.
     * @return string
     */
    public function setUserPhoto(string $user_photo): void
    {
        $this->user_photo = $user_photo;
    }

    /**
     * Getter pour photo vendeur.
     * @return string
     */

    public function getUserPhoto(): string
    {
        return $this->user_photo;
    }

    /**
     * Setter pour le author.
     * @param int $author
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * Getter pour l'auteur.
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }
}
