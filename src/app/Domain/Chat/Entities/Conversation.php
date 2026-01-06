<?php 

namespace App\Domain\Chat\Entities;

class Conversation
{
    public function __construct(
        public int $id,
        public ChatType $type,
        public ?string $title,
        public ChatStatus $status
    ) {}

    
}