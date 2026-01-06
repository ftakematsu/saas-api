<?php 

namespace App\Application\Chat;

use App\Domain\Chat\Entities\Message;
use App\Domain\Chat\Repositories\MessageRepository;

class SendMessageUseCase
{
    public function __construct(
        private MessageRepository $repository
    ) {}

    public function execute(SendMessageDTO $dto): void
    {
        $message = new Message(
            conversationId: $dto->conversationId,
            userId: $dto->userId,
            content: $dto->content
        );

        $this->repository->save($message);
    }
}