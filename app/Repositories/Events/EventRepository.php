<?php 

namespace App\Repositories\Events;

use Carbon\Carbon;

interface EventRepository
{
    public function createEvent(array $data);
    public function deleteLatestEvent();
    public function getLatestEventBetweenDates(Carbon $day1, Carbon $day2);
}