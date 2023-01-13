<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class StaffMail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime',
    ];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
        # code...
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
        # code...
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            0 => 'danger',
            1 => 'success',
        ];
        return $badges[$this->read];
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDate();
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->toFormattedTime();
    }
}
