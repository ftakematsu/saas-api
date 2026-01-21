<?php 

namespace App\Application\Chat;

use App\Domain\Chat\Entities\Message;
use App\Domain\Chat\Events\MessageSent;
use App\Domain\Chat\Repositories\MessageRepository;

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

        // Event::dispatch(new MessageSent($message)); // Evite usar isso, pois isso dispara para todos ignorando o contexto do socket
        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }
}