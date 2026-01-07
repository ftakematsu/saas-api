<?php 

namespace App\Application\Chat;

use App\Domain\Chat\Entities\Message;
use App\Domain\Chat\Events\MessageSent;
use App\Domain\Chat\Repositories\MessageRepository;
use Illuminate\Support\Facades\Event;

class SendMessageUseCase
{
    public function __construct(
        private MessageRepository $repository
    ) {}

    public function execute(SendMessageDTO $dto)
    {
        $message = new Message(
            conversationId: $dto->conversationId,
            userId: $dto->userId,
            content: $dto->content
        );

        $this->repository->save($message);

        Event::dispatch(new MessageSent($message));

        return $message;
    }
}