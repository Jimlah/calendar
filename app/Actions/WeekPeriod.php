<?php

namespace App\Actions;

use App\Interfaces\HasMatrix;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class WeekPeriod extends Period implements HasMatrix
{

    public function matrix(): Collection
    {
        return collect(CarbonImmutable::now()->startOfWeek(CarbonInterface::SUNDAY)
            ->toPeriod(CarbonImmutable::now()->endOfWeek(CarbonInterface::SATURDAY), CarbonInterval::day()))
            ->map(fn(CarbonImmutable $date)=>
            collect($date->startOfDay()
                ->toPeriod($date->endOfDay(), CarbonInterval::hour())
                ->toArray()));
    }
}
