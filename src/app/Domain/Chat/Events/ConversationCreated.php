<?php

namespace App\Domain\Chat\Events;

use App\Domain\Chat\Entities\Conversation as ConverstationEntity;

class ConversationCreated
{
    public function __construct(
        public ConverstationEntity $conversation
    ) {}
}
