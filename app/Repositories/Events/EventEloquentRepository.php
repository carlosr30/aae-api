<?php 

namespace App\Repositories\Events;

use App\Models\Event;
use App\Models\EventDay;
use App\Repositories\Events\EventRepository;
use Carbon\Carbon;

class EventEloquentRepository implements EventRepository
{
    public function createEvent(array $data) : void
    {
        $event = Event::create([
            'name' => $data['name'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date']
        ]);

        $eventDaysData = [];
        foreach ($data['event_days'] as $day) {
            $eventDaysData[] = [
                'day_index' => $day,
                'event_id' => $event->id
            ];
        };

        EventDay::insert($eventDaysData);
    }

    public function deleteLatestEvent()
    {
        $event = Event::orderBy('created_at', 'DESC')->first();
        if ($event) {
            $event->delete();
        }
    }

    public function getLatestEventBetweenDates(
        Carbon $startDate,
        Carbon $endDate
    ) {
        return Event::with('eventDays')
            ->where('start_date', '<', $endDate)
            ->where('end_date', '>', $startDate)
            ->orderBy('created_at' , 'DESC')
            ->first();
    }
}