<div class="container">
    <!-- Sidebar -->
    <?php if ($conversations): ?>

        <div class="sidebar">
            <h2>Messagerie</h2>

            <div class="contact-list">
                <?php
                foreach ($conversations as $conversation):
                    $orderConversation = array_reverse($conversation);
                    $lastMessage = $orderConversation[count($orderConversation) - 1];
                    $undreadBook = 0;

                    $conversationId = $lastMessage->getSenderId() < $lastMessage->getReceiverId()
                        ? $lastMessage->getSenderId() . '_' . $lastMessage->getReceiverId()
                        : $lastMessage->getReceiverId() . '_' . $lastMessage->getSenderId(); ?>
                    <?php
                    foreach ($conversation as $message):
                        if ($message->getIsRead() == 0 && $message->getContent() != "" && $message->getSenderId() != $user->getId()) {
                            $undreadBook = $undreadBook + 1;
                        }
                    endforeach; ?>

                    <?php if ($lastMessage->getContent()): ?>
                        <a href="index.php?action=conversation&id=<?= $conversationId ?>">

                            <div class="contact">

                                <?php if ($lastMessage->getSenderId() != $user->getId()): ?>
                                    <?php if ($undreadBook > 0): ?>
                                        <span class="notification-message"><?= $undreadBook ?></span>
                                    <?php endif; ?>

                                    <img src="<?= htmlspecialchars($lastMessage->getSenderPhoto()) ?>" alt="Avatar" class="contact-avatar">
                                    <div class="contact-info">
                                        <p class="contact-name"><?= htmlspecialchars($lastMessage->getSenderNickname()) ?></p>
                                        <p class="contact-preview"><?= htmlspecialchars($lastMessage->getContent()) ?></p>
                                    </div>
                                    <p class="contact-time"><?= htmlspecialchars($lastMessage->getSentAt()) ?></p>
                                <?php else: ?>
                                    <?php if ($undreadBook > 0): ?>
                                        <span class="notification-message"><?= $undreadBook ?></span>
                                    <?php endif; ?> <img src="<?= htmlspecialchars($lastMessage->getReceiverPhoto()) ?>" alt="Avatar" class="contact-avatar">
                                    <div class="contact-info">
                                        <p class="contact-name"><?= htmlspecialchars($lastMessage->getReceiverNickname()) ?></p>
                                        <p class="contact-preview"><?= htmlspecialchars($lastMessage->getContent()) ?></p>
                                    </div>
                                    <p class="contact-time"><?= htmlspecialchars($lastMessage->getSentAt()) ?></p>
                                <?php endif; ?>

                            </div>
                        </a>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </div>
        <!-- Chat area -->

        <div class="chat-area">
            <div class="chat-header">
                <?php if ($selectConversationLastMessages->getSenderId() != $user->getId()): ?>
                    <img src="<?= htmlspecialchars($selectConversationLastMessages->getSenderPhoto()) ?>" alt="Avatar" class="contact-avatar">
                    <a href="index.php?action=publicAccount&id=<?= $selectConversationLastMessages->getSenderId() ?>">

                        <p class="chat-name"><?= htmlspecialchars($selectConversationLastMessages->getSenderNickname()) ?></p>
                    </a>

                <?php else: ?>
                    <img src="<?= htmlspecialchars($selectConversationLastMessages->getReceiverPhoto()) ?>" alt="Avatar" class="contact-avatar">
                    <a href="index.php?action=publicAccount&id=<?= $selectConversationLastMessages->getReceiverId() ?>">

                        <p class="chat-name"><?= htmlspecialchars($selectConversationLastMessages->getReceiverNickname()) ?></p>
                    </a>
                <?php endif; ?>

            </div>
            <div class="chat-messages">
                <?php foreach (array_reverse($selectConversation) as $message): ?>

                    <?php if ($message->getSenderId() != $user->getId()): ?>

                        <div class="message received">
                            <?php if ($message->getContent() != "") : ?>

                                <img src="<?= htmlspecialchars($message->getSenderPhoto()) ?>" alt="Avatar" class="contact-avatar">
                                <div class="message-content">
                                    <p><?= htmlspecialchars($message->getContent()) ?></p>
                                    <span class="message-time"><?= htmlspecialchars($message->getSentAt()) ?></span>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php else: ?>
                        <div class="message sent">
                            <?php if ($message->getContent() != "") : ?>

                                <div class="message-content">
                                    <p><?= htmlspecialchars($message->getContent()) ?></p>
                                    <span class="message-time"><?= htmlspecialchars($message->getSentAt()) ?></span>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <?php
            if ($message->getSenderId() != $user->getId()) {
                $receiver = $message->getSenderId();
            } else {
                $receiver = $message->getReceiverId();
            }
            ?>

            <form action="index.php?action=newMessage&id=<?= $receiver ?>" method="post" enctype="multipart/form-data">
                <div class="chat-input">
                    <input type="text" name="content" placeholder="Tapez votre message ici">
                    <button>Envoyer</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="sidebar">
            <p>Vous n'avez pas de convesersation</p>
        </div>
        <div class="chat-area">

            <div class="chat-messages">

                <p>Vous n'avez pas de message</p>

            </div>


        </div>
    <?php endif; ?>




</div>



</div>