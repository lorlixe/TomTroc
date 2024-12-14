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
        $undreadBook =  0;

        foreach ($messages as $message) {
            if ($message->getIsRead() == 0 && $message->getContent() != ""   && $message->getSenderId() != $_SESSION['idUser']) {
                $undreadBook = $undreadBook + 1;
            }
        }
        $_SESSION['undreadBook'] = $undreadBook;
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
        $selectConversationID = Utils::request("id");


        if (!$selectConversationID) {
            $firstKey = array_key_first($conversation);
            $selectConversation = $conversation[$firstKey] ?? null;
            //verifier si on a le droit de changer la conversation
            Utils::checkUseConversation($selectConversationID);
            if ($selectConversation === null) {
                $view = new View("Message");
                $view->render("allMessages", ['conversations' => $conversation, 'user' => $user, 'selectConversation' => [], 'selectConversationLastMessages' => []]);
            }
        } else {
            if (!isset($conversation[$selectConversationID])) {
                throw new Exception("Vous n'êtes pas autorisé a effectuer cette");
            }
            //verifier si on a le droit de changer la conversation
            Utils::checkUseConversation($selectConversationID);
            // Filtrer la conversation avec l'ID sélectionné
            $selectConversation = $conversation[$selectConversationID];
        }

        if ($conversation != []) {
            $selectConversationLastMessages = end($selectConversation);
        } else {
            $selectConversationLastMessages = [];
        }
        foreach ($selectConversation as $message) {
            $selectSender_id = $message->getSenderId();
            if ($message->getReceiverId() == $user->getId()) {
                $messageManager = new MessageManager();
                $messageManager->messagesAsRead($selectSender_id, $user->getId());
            }
        }
        // Rendre la vue avec les conversations
        $view = new View("Message");
        $view->render("allMessages", ['conversations' => $conversation, 'user' => $user, 'selectConversation' => $selectConversation, 'selectConversationLastMessages' => $selectConversationLastMessages]);
    }

    public function creatConversation(): void
    {

        $UserManager = new UserManager;
        $user = $UserManager->getUserById($_SESSION['idUser']);

        $newsender_id = $user->getId();
        $newreceiver_id = Utils::request("receiver_id");

        $newConversationId = $newsender_id < $newreceiver_id
            ? $newsender_id . '_' . $newreceiver_id
            : $newreceiver_id . '_' . $newsender_id;


        $allMessages = $this->allMessage();
        $conversation = []; // Initialiser le tableau des conversations

        foreach ($allMessages as $message) {
            $sender_id = $message->getSenderId();
            $receiver_id = $message->getReceiverId();


            // Générer un identifiant unique pour chaque conversation
            $conversationId = $sender_id < $receiver_id
                ? $sender_id . '_' . $receiver_id
                : $receiver_id . '_' . $sender_id;

            // vérifier ajouter l'ID de la conversation au tableau
            if (!isset($conversation[$conversationId])) {
                $conversation[$conversationId] = [];
            }
        }

        if (!isset($conversation[$newConversationId])) {
            $messageManager = new MessageManager();
            $messageManager->setConversation($newsender_id, $newreceiver_id);
        }


        Utils::redirect("conversation&id=" . $newConversationId);
    }
    public function creatMessage(): void
    {
        $account = new UserController;
        $account->checkIfUserIsConnected();

        $UserManager = new UserManager;
        $sender = $UserManager->getUserById($_SESSION['idUser']);
        $sender_id = $sender->getId();
        $receiver_id = Utils::request("id");
        $content = Utils::request("content");
        $conversationId = $sender_id < $receiver_id
            ? $sender_id . '_' . $receiver_id
            : $receiver_id . '_' . $sender_id;

        $arrayMessage = [
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'content' => $content,

        ];
        $message = new Message($arrayMessage);
        $messageManager = new MessageManager();
        $messageManager->setMessage($message);

        Utils::redirect("conversation");
    }

    public function unreadBook(): void
    {
        $account = new UserController;
        $account->checkIfUserIsConnected();
        $undreadBook =  0;

        $allMessages = $this->allMessage();
        foreach ($allMessages as $message) {
            if ($message->getIsRead() == 0 && $message->getContent() != ""   && $message->getSenderId() != $_SESSION['idUser']) {
                $undreadBook = $undreadBook + 1;
            }
        }
        $_SESSION['undreadBook'] = $undreadBook;
        // var_dump($undreadBook)

    }
}
