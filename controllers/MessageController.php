<?php

class MessageController
{
    public function allMessage()
    {
        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);

        $user_id = $user->getId();

        $messageManager = new MessageManager();
        $messages = $messageManager->getAllMessage($user_id);
        return $messages;
    }

    public function conversation(): void
    {
        $account = new UserController;
        $account->checkIfUserIsConnected();

        $allMessages = $this->allMessage();
        $conversation = []; // Initialiser le tableau des conversations



        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);

        // Grouper les messages par conversation
        foreach ($allMessages as $message) {
            $sender_id = $message->getSenderId();
            $receiver_id = $message->getReceiverId();


            // Générer un identifiant unique pour chaque conversation
            $conversationId = $sender_id < $receiver_id
                ? $sender_id . '_' . $receiver_id
                : $receiver_id . '_' . $sender_id;

            // Ajouter le message à la conversation correspondante
            if (!isset($conversation[$conversationId])) {
                $conversation[$conversationId] = [];
            }

            $conversation[$conversationId][] = $message;
        }

        // Rendre la vue avec les conversations
        $view = new View("Message");
        $view->render("allMessages", ['conversations' => $conversation, 'user' => $user]);
    }

    public function oneConsersation()
    {
        $conversationId = Utils::request("conversationId");

        $allMessages = $this->allMessage();
        $conversation = []; // Initialiser le tableau des conversations

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);

        // Grouper les messages par conversation
        foreach ($allMessages as $message) {

            // Ajouter le message à la conversation correspondante
            if (!isset($conversation[$conversationId])) {
                $conversation[$conversationId] = [];
            }

            $conversation[$conversationId][] = $message;
        }
    }
}
