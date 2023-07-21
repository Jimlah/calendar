<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class YearPeriod  extends Period implements \App\Interfaces\HasMatrix
{

    public function matrix(): Collection
    {
        $start = CarbonImmutable::parse($this->date)->startOfYear();
        $end = CarbonImmutable::parse($this->date)->endOfYear();
        return collect($start->toPeriod($end, CarbonInterval::month())->toArray())
            ->map(fn(CarbonImmutable $date)=>
            collect($date->startOfMonth()->toPeriod($date->endOfMonth(), CarbonInterval::day())));
    }
}
