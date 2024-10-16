<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attendee() :BelongsTo
    {
        return $this->belongsTo(User::class, 'attendee_id');
    }

    public function event() :BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function ticket() :BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
