<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Carbon\CarbonPeriodImmutable;
use Illuminate\Support\Collection;

class DayPeriod extends Period implements \App\Interfaces\HasMatrix
{

    public function matrix(): Collection
    {
        $startOfDay = CarbonImmutable::create($this->date)->startOfDay();
        $endOfDay = CarbonImmutable::create($this->date)->endOfDay();
        return collect([collect($startOfDay->toPeriod($endOfDay, CarbonInterval::hour()))]);
    }
}
