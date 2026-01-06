<?php 

namespace App\Application\Chat;

class SendMessageDTO
{
    public function __construct(
        public int $conversationId,
        public int $userId,
        public string $content
    ) {}
}