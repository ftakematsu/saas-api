<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('conversation.{conversationId}', function ($user, int $conversationId) {
    //dd($user);
    //return true;    
    return $user->isParticipantOfConversation($conversationId);
});

