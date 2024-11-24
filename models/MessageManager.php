<?php

class MessageManager extends AbstractEntityManager
{


    // public function getMessagesByConversation(int $user1_id, int $user2_id)
    // {
    //     $conversation_id = $user1_id < $user2_id
    //         ? $user1_id . '_' . $user2_id
    //         : $user2_id . '_' . $user1_id;

    //     $sql = "SELECT message.*, 
    //     user.nickname,
    //     user.user_photo,
    //     FROM messages    
    //     JOIN user ON message.sender_id = user.nickname
    //     JOIN user ON message.receiver_id = user.nickname

    //     JOIN user ON message.receiver_id = user.user_photo,
    //     JOIN user ON user.user_photo = user.user_photo,
    //         WHERE conversation_id = :conversation_id
    //         ORDER BY sent_at ASC";

    //     $result = $this->db->query($sql);


    //     $messages = [];
    //     while ($message = $result->fetch(PDO::FETCH_ASSOC)) {
    //         $messages[] = new Message($message);
    //     }

    //     return $messages;
    // }

    public function getMessagesByConversation(int $user1_id, int $user2_id)
    {
        // Générer un identifiant de conversation unique
        $conversation_id = $user1_id < $user2_id
            ? $user1_id . '_' . $user2_id
            : $user2_id . '_' . $user1_id;

        // Requête SQL corrigée
        $sql = "
        SELECT 
        messages.*,
        sender.nickname AS sender_nickname,
        sender.user_photo AS sender_photo,
        sender.id AS sender_id,
        receiver.nickname AS receiver_nickname,
        receiver.user_photo AS receiver_photo,
        receiver.id AS receiver_id
        FROM messages
        JOIN user AS sender ON messages.sender_id = sender.id
        JOIN user AS receiver ON messages.receiver_id = receiver.id
        WHERE messages.conversation_id = :conversation_id
        ORDER BY messages.sent_at ASC;
         ";

        $result = $this->db->query($sql, ['conversation_id' => $conversation_id]);


        $messages = [];
        while ($message = $result->fetch(PDO::FETCH_ASSOC)) {
            $messages[] = new Message($message);
        }

        return $messages;
    }


    public function getAllMessage(int $user_id)
    {

        $user_id = intval($user_id);
        $sql = "
        SELECT 
        messages.*,
        sender.nickname AS sender_nickname,
        sender.user_photo AS sender_photo,
        sender.id AS sender_id,
        receiver.nickname AS receiver_nickname,
        receiver.user_photo AS receiver_photo,
        receiver.id AS receiver_id
        FROM messages
        JOIN user AS sender ON messages.sender_id = sender.id
        JOIN user AS receiver ON messages.receiver_id = receiver.id
        WHERE  sender_id = :user_id OR receiver_id = :user_id
        ORDER BY messages.sent_at DESC";
        $result = $this->db->query($sql, ['user_id' => $user_id]);

        $messages = [];

        while ($message = $result->fetch(PDO::FETCH_ASSOC)) {
            $messages[] = new Message($message);
        }

        return $messages;
    }

    public function getMessage(int $sender_id, int $receiver_id)
    {

        $sql = "SELECT * FROM messages WHERE receiver_id = :receiver_id and sender_id = :sender_id ";
        $result = $this->db->query($sql, ['receiver_id' => $receiver_id, 'sender_id' => $sender_id]);
        $message = $result->fetch();
        if ($message) {
            return new Message($message);
        }
        return null;
    }


    public function setMessage(Message $message): void
    {
        $sql = "INSERT INTO message (sender_id, receiver_id, content) VALUES ( :sender_id, :receiver_id, :content)";
        $this->db->query($sql, [
            'sender_id' => $message->getSenderId(),
            'receiver_id' => $message->getReceiverId(),
            'content' => $message->getContent(),
        ]);
    }
}
