<?php 

namespace App\Domain\Chat\Repositories;
use App\Domain\Chat\Entities\Message;

interface MessageRepository
{
    public function save(Message $message): void;

    public function getAll($conversationId);
}