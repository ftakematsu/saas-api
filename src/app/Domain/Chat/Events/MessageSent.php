<?php

namespace App\Domain\Chat\Events;

use App\Domain\Chat\Entities\Message as MessageEntity;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MessageSent implements ShouldBroadcast {
    public function __construct(
        public MessageEntity $message
    ) {}

    public function broadcastOn()
    {
        return new PrivateChannel(
            'conversation.' . $this->message->conversationId
        );
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => [
                'conversationId' => $this->message->conversationId,
                'userId'         => $this->message->userId,
                'content'        => $this->message->content,
            ]
        ];
    }
}
