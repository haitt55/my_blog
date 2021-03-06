<?php

namespace App\Models;

use App\Models\BaseModel;

class Message extends BaseModel
{
    protected $table = 'messages';

    protected $fillable = [
        'name', 'email', 'phone_number', 'content', 'unread'
    ];

    public function scopeUnread($query)
    {
        return $query->whereUnread(true);
    }
}
