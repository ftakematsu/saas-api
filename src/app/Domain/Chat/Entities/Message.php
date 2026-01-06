<?php 

namespace App\Domain\Chat\Entities;

class Message
{
    public function __construct(
        public int $conversationId,
        public int $userId,
        public string $content
    ) {}
    
}