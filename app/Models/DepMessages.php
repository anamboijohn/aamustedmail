<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_message',
        'dep_conversation_id',
        'read',
        'body',
    ];


    public function conversation()
    {
        return $this->belongsTo(DepConversation::class, 'dep_conversation_id');
        # code...
    }

    public function user()
    {
        return $this->belongsTo(Department::class, 'sender_id');
        # code...
    }
}
