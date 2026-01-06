<?php

namespace App\Models;

use App\Domain\Chat\Entities\ChatStatus;
use App\Domain\Chat\Entities\ChatType;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['type', 'title', 'status'];

    protected $casts = [
        'type' => ChatType::class,
        'status' => ChatStatus::class
    ];

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function participants() {
        return $this->belongsToMany(
            User::class,
            'conversation_participants'
        )->withTimestamps();
    }
}
