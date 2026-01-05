<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'status',
        'description',
        'value'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
