<?php

namespace App\Listeners;

use App\Domain\Chat\Events\MessageSent;
use Illuminate\Support\Facades\Log;

class LogMessageSent
{
    public function handle(MessageSent $event): void
    {
        Log::info('Mensagem enviada', [
            'content' => $event->message->content,
            'user_id' => $event->message->userId,
            'conversation_id' => $event->message->conversationId,
        ]);
    }
}