<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class YearPeriod  extends Period implements \App\Interfaces\HasMatrix
{

    public function matrix(): Collection
    {
        $start = CarbonImmutable::parse($this->date)->startOfYear();
        $end = CarbonImmutable::parse($this->date)->endOfYear();

        $result =  collect($start->toPeriod($end, CarbonInterval::month())->toArray())
            ->map(fn(CarbonImmutable $date) => $this->normalize(collect($date->startOfMonth()->startOfWeek(CarbonInterface::SUNDAY)->toPeriod($date->endOfMonth()->endOfWeek(CarbonInterface::SATURDAY), CarbonInterval::day()))));
        return  $result;
    }

    private function normalize(Collection $results): Collection
    {
        if($results->count() < 42){
            $endOfWeek = $results->last();
            $next7day =$endOfWeek->add(CarbonInterval::week());
            $week = $endOfWeek->add(CarbonInterval::day())->toPeriod($next7day)->toArray();
            $results->push(...$week);
        }
        return $results;
    }
}
