<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;

class Calendar
{
    public function buildYear()
    {}
    public function buildMonth($year, $month): array
    {
//        $startOfMonth = CarbonImmutable::create($year, $month);
//        $endOfMonth = $startOfMonth->endOfMonth();
//        $startOfWeek = $startOfMonth->startOfWeek(CarbonInterface::SUNDAY);
//        $endOfWeek = $endOfMonth->endOfWeek(CarbonInterface::SATURDAY);
//
//        return [
//            'year' => $startOfMonth->year,
//            'month' => $startOfMonth->format('F'),
//            'weeks' => collect($startOfWeek->toPeriod($endOfWeek)->toArray())
//        ->map(fn ($date) => [
//            'path' => $date->format('/Y/m/d'),
//            'day' => $date->day,
//            'withinMonth' => $date->between($startOfMonth, $endOfMonth),
//        ])
//        ->chunk(7),
//    ];
    }

    public function buildWeek()
    {

    }

    public function buildDay()
    {}
}
