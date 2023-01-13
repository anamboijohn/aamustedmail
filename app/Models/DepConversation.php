<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepConversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_message',
    ];

    //relationships

    public function messages()
    {
        return $this->hasMany(DepMessages::class, 'dep_conversation_id');

        # code...
    }

    public function user()
    {
        return $this->belongsTo(Department::class);
        # code...
    }
}
