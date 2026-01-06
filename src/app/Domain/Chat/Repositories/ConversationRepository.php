<?php 

namespace App\Domain\Chat\Repositories;

use App\Domain\Chat\Entities\ChatStatus;
use App\Domain\Chat\Entities\ChatType;
use App\Domain\Chat\Entities\Conversation;

interface ConversationRepository {
    public function createOrGetConversation(int $userId, int $otherUserId, ?string $title, ChatType $type, ChatStatus $status): Conversation;
}