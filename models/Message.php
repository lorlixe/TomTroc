<?php

/**
 * Entité User : un user est défini par son id, un email et un password.
 */
class Message extends AbstractEntity
{
    private int $sender_id;
    private int $receiver_id;
    private string $content;
    private string $sent_at;
    private int $is_read = 0;
    private string $sender_nickname = "";
    private string $sender_photo = "";
    private string $receiver_nickname = "";
    private string $receiver_photo = "";

    public function setSenderId(int $sender_id): void
    {
        $this->sender_id = $sender_id;
    }

    public function getSenderId(): int
    {
        return $this->sender_id;
    }

    public function setReceiverId(int $receiver_id): void
    {
        $this->receiver_id = $receiver_id;
    }

    public function getReceiverId(): int
    {
        return $this->receiver_id;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setSentAt(string $sent_at): void
    {
        $this->sent_at = $sent_at;
    }

    public function getSentAt(): string
    {
        return $this->sent_at;
    }

    public function setIsRead(int $is_read): void
    {
        $this->is_read = $is_read;
    }

    public function getIsRead(): int
    {
        return $this->is_read;
    }

    public function setSenderNickname(string $sender_nickname): void
    {
        $this->sender_nickname = $sender_nickname;
    }

    public function getSenderNickname(): string
    {
        return $this->sender_nickname;
    }

    public function setSenderPhoto(string $sender_photo): void
    {
        $this->sender_photo = $sender_photo;
    }

    public function getSenderPhoto(): string
    {
        return $this->sender_photo;
    }

    public function setReceiverNickname(string $receiver_nickname): void
    {
        $this->receiver_nickname = $receiver_nickname;
    }

    public function getReceiverNickname(): string
    {
        return $this->receiver_nickname;
    }

    public function setReceiverPhoto(string $receiver_photo): void
    {
        $this->receiver_photo = $receiver_photo;
    }

    public function getReceiverPhoto(): string
    {
        return $this->receiver_photo;
    }
}
