<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Event;

class EventDay extends BaseModel
{
    protected $fillable = [
        'day_index',
        'event_id'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
