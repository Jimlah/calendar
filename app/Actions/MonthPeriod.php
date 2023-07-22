<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class MonthPeriod extends Period implements \App\Interfaces\HasMatrix
{

    public function matrix(): Collection
    {
        $startOfMonth = CarbonImmutable::create($this->date)->startOfMonth();
        $endOfMonth = $startOfMonth->endOfMonth();
        $startOfWeek = $startOfMonth->startOfWeek(CarbonInterface::SUNDAY);
        $endOfWeek = $endOfMonth->endOfWeek(CarbonInterface::SATURDAY);
        $results = collect($startOfWeek->toPeriod($endOfWeek)->toArray())
            ->chunk(7);

        return $this->normalize($results);
    }

    private function normalize($results)
    {
        $endOfWeek = $results->last()->last();
        if($results->count() < 6){
            $nextDay = $endOfWeek->add(CarbonInterval::day());
            $next7day =$endOfWeek->add(CarbonInterval::day(7));
            $week = $nextDay->toPeriod($next7day)->toArray();
            $results->add(collect($week));
        }
        return $results;
    }
}
