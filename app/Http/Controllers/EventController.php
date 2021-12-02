<?php

namespace App\Http\Controllers;

use App\Http\Requests\Events\CreateEventRequest;
use App\Http\Resources\Events\EventResource;
use App\Repositories\Events\EventRepository;
use App\Services\DateService;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends Controller
{
    public function create(
        CreateEventRequest $request,
        EventRepository $eventRepo,
    ) {
        $eventRepo->deleteLatestEvent();
        $eventRepo->createEvent($request->all());
        return new JsonResponse(null, 201);
    }

    public function get(
        int $year,
        int $month,
        DateService $dateService,
        EventRepository $eventRepo
    ) {
        $startDate = $dateService->getFirstDayOfTheMonth($year, $month);
        $endDate = $dateService->getLastDayOfTheMonth($year, $month);
        $event = $eventRepo->getLatestEventBetweenDates($startDate, $endDate);
        if (! $event) {
            return new JsonResponse(null);
        }

        return new EventResource($event);
    }
    
}
