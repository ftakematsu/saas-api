<?php 

namespace App\Application\Chat;

use App\Domain\Chat\Entities\Message;
use App\Domain\Chat\Repositories\MessageRepository;

class GetMessageUseCase {
    public function __construct(
        private MessageRepository $repository
    ) {}

    public function execute($conversationId) {
       $resource = $this->repository->getAll($conversationId);
       return $resource;
    }
}