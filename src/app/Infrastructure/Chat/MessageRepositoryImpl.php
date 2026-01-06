<?php 

namespace App\Infrastructure\Chat;

use App\Domain\Chat\Entities\Message as MessageEntity;
use App\Domain\Chat\Repositories\MessageRepository;
use App\Models\Message;

class MessageRepositoryImpl implements MessageRepository
{
    public function save(MessageEntity $message): void
    {
        Message::create([
            'conversation_id' => $message->conversationId,
            'user_id' => $message->userId,
            'content' => $message->content,
        ]);
    }

    public function getAll($conversationId) {
        $messages = Message::where('conversation_id', $conversationId)->get();

        return $messages->map(function ($message) {
            return new MessageEntity(
                conversationId: $message->conversation_id,
                userId: $message->user_id,
                content: $message->content
            );
        });
    }
}
