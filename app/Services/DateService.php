<?php

namespace App\Services;

use Carbon\Carbon;

class DateService
{
    public function getFirstDayOfTheMonth($year, $month)
    {
        return Carbon::createFromFormat('Y-m-d', "{$year}-${month}-1");
    }

    public function getLastDayOfTheMonth($year, $month)
    {
        return Carbon::createFromFormat('Y-m-d', "{$year}-${month}-1")->endOfMonth();
    }
}