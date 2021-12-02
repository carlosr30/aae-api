<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\EventDay;

class Event extends BaseModel
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($event) {
            $event->eventDays()->delete();
        });
    }

    public function eventDays() {
        return $this->hasMany(EventDay::class);
    }
}
