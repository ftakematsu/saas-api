<?php

namespace App\Http\Controllers\Api;

use App\Application\Chat\CreateConversationUseCase;
use App\Application\Chat\GetMessageUseCase;
use App\Application\Chat\SendMessageDTO;
use App\Application\Chat\SendMessageUseCase;
use App\Domain\Chat\Entities\ChatStatus;
use App\Domain\Chat\Entities\ChatType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {
    
    public function send(Request $request, SendMessageUseCase $useCase) {
        $dto = new SendMessageDTO(
            conversationId: $request->get('conversationId'),
            userId: Auth::user()->id,
            content: $request->get('content')
        );
        $useCase->execute($dto);
        return response()->json(['status' => 'sent']);
    }

    public function getAll($conversationId, GetMessageUseCase $useCase) {
        $messages = $useCase->execute($conversationId);
        return response()->json(['data' => $messages]);
    }

    public function createConversation(Request $request, CreateConversationUseCase $useCase) {
        $conversation = $useCase->execute(
            authUserId: Auth::user()->id,
            otherUserId: $request->get('otherUserId'),
            type: ChatType::PRIVATE,
            status: ChatStatus::OPEN
        );

        return response()->json($conversation, 201);
    }
}
