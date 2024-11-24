<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Messagerie</h2>
        <div class="contact-list">
            <?php foreach ($conversations as $conversation): ?>
                <div class="contact">

                    <?php
                    // Récupérer le dernier message de la conversation
                    $lastMessage = $conversation[count($conversation) - 1];

                    // Vérifier si le dernier message est envoyé par un autre utilisateur
                    if ($lastMessage->getSenderId() != $user->getId()): ?>
                        <img src="<?= htmlspecialchars($lastMessage->getSenderPhoto()) ?>" alt="Avatar" class="contact-avatar">
                        <div class="contact-info">
                            <p class="contact-name"><?= htmlspecialchars($lastMessage->getSenderNickname()) ?></p>
                            <p class="contact-preview"><?= htmlspecialchars($lastMessage->getContent()) ?></p>
                        </div>
                        <p class="contact-time"><?= htmlspecialchars($lastMessage->getSentAt()) ?></p>
                    <?php else: ?>
                        <img src="<?= htmlspecialchars($lastMessage->getReceiverPhoto()) ?>" alt="Avatar" class="contact-avatar">
                        <div class="contact-info">
                            <p class="contact-name"><?= htmlspecialchars($lastMessage->getReceiverNickname()) ?></p>
                            <p class="contact-preview"><?= htmlspecialchars($lastMessage->getContent()) ?></p>
                        </div>
                        <p class="contact-time"><?= htmlspecialchars($lastMessage->getSentAt()) ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>


        </div>
    </div>

    <!-- Chat area -->
    <?php
    // Récupérer la dernère conversation
    $lastConversation = $conversation[count($conversation) - 1]; ?>


    <div class="chat-area">
        <div class="chat-header">
            <?php if ($lastMessage->getSenderId() != $user->getId()): ?>
                <img src="<?= htmlspecialchars($lastConversation->getSenderPhoto()) ?>" alt="Avatar" class="contact-avatar">
                <p class="chat-name"><?= htmlspecialchars($lastConversation->getSenderNickname()) ?></p>

            <?php else: ?>
                <img src="<?= htmlspecialchars($lastConversation->getReceiverPhoto()) ?>" alt="Avatar" class="contact-avatar">
                <p class="chat-name"><?= htmlspecialchars($lastConversation->getReceiverNickname()) ?></p>

            <?php endif; ?>

        </div>
        <div class="chat-messages">
            <?php foreach (array_reverse($conversation) as $message): ?>

                <?php if ($message->getSenderId() != $user->getId()): ?>

                    <div class="message received">
                        <img src="<?= htmlspecialchars($message->getSenderPhoto()) ?>" alt="Avatar" class="contact-avatar">
                        <div class="message-content">
                            <p><?= htmlspecialchars($message->getContent()) ?></p>
                            <span class="message-time"><?= htmlspecialchars($message->getSentAt()) ?></span>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="message sent">
                        <div class="message-content">
                            <p><?= htmlspecialchars($message->getContent()) ?></p>
                            <span class="message-time"><?= htmlspecialchars($message->getSentAt()) ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <div class="chat-input">
            <input type="text" placeholder="Tapez votre message ici">
            <button>Envoyer</button>
        </div>
    </div>

</div>