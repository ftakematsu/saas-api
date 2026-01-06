<?php 

namespace App\Application\Chat;

use App\Domain\Chat\Entities\ChatStatus;
use App\Domain\Chat\Entities\ChatType;
use App\Domain\Chat\Entities\Conversation;
use App\Domain\Chat\Entities\Message;
use App\Domain\Chat\Repositories\ConversationRepository;

class CreateConversationUseCase {
    public function __construct(
        private ConversationRepository $repository
    ) {}

    public function execute(int $authUserId, int $otherUserId, ChatType $type, ChatStatus $status): Conversation {
        $conversation = $this->repository->createOrGetConversation($authUserId, $otherUserId, "Novo chat", $type, $status);
        return $conversation;
    }
}