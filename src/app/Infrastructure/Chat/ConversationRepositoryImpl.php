<?php 

namespace App\Infrastructure\Chat;

use App\Domain\Chat\Entities\ChatStatus;
use App\Domain\Chat\Entities\ChatType;
use App\Domain\Chat\Entities\Conversation as ConversationEntity;
use App\Domain\Chat\Repositories\ConversationRepository;
use App\Models\Conversation;

class ConversationRepositoryImpl implements ConversationRepository
{
    public function createOrGetConversation(
        int $authUserId,
        int $otherUserId,
        ?string $title,
        ChatType $type,
        ChatStatus $status
    ): ConversationEntity {

        $conversation = Conversation::where('status', ChatStatus::OPEN->value)
            ->whereHas('participants', fn ($q) => $q->where('user_id', $authUserId))
            ->whereHas('participants', fn ($q) => $q->where('user_id', $otherUserId))
            ->first();

        if (! $conversation) {
            $conversation = Conversation::create([
                'title' => $title,
                'type' => ChatType::PRIVATE->value,
                'status' => ChatStatus::OPEN->value,
            ]);

            $conversation->participants()->attach([
                $authUserId,
                $otherUserId,
            ]);
        }

        return new ConversationEntity(
            $conversation->id,
            $conversation->type,
            $conversation->title,
            $conversation->status
        );
    }
}
