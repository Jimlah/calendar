<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class WeekPeriod extends Period implements \App\Interfaces\HasMatrix
{

    public function matrix(): Collection
    {
        $start = Carbon::parse($this->date)->startOfWeek();
        $end = Carbon::parse($this->date)->endOfWeek();
        $range = Carbon::parse($start)->range($end, CarbonInterval::weeks());
        return new Collection($range);
    }
}
