<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class YearPeriod  extends Period implements \App\Interfaces\HasMatrix
{

    public function matrix(): Collection
    {
        $start = Carbon::parse($this->date)->startOfYear();
        $end = Carbon::parse($this->date)->endOfYear();
        $range = Carbon::parse($start)->range($end, CarbonInterval::PERIOD_MONTHS);
        return new Collection($range);
    }
}
