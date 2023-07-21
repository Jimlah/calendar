<?php

namespace App\Factories;

use App\Actions\DayPeriod;
use App\Actions\MonthPeriod;
use App\Actions\WeekPeriod;
use App\Actions\YearPeriod;
use App\Interfaces\HasMatrix;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

class PeriodFactory
{
    public const DAY_PERIOD = DayPeriod::class;

    public const WEEK_PERIOD = WeekPeriod::class;

    public const MONTH_PERIOD = MonthPeriod::class;

    public const YEAR_PERIOD = YearPeriod::class;


    public \DateTimeImmutable $currentDate;

    public string $defaultPeriod;

    public function __construct()
    {
        $this->currentDate = CarbonImmutable::now();
        $this->defaultPeriod = self::MONTH_PERIOD;
    }

    public function make(): HasMatrix
    {
        return match ($this->defaultPeriod) {
            self::DAY_PERIOD => new DayPeriod($this->currentDate),
            self::WEEK_PERIOD => new WeekPeriod($this->currentDate),
            self::YEAR_PERIOD => new YearPeriod($this->currentDate),
            default => new MonthPeriod($this->currentDate),
        };
    }

    public function setPeriod(string $period): void
    {
        $this->defaultPeriod = $period;
    }

    public function isDefaultPeriod(string $period): bool
    {
        return $this->defaultPeriod === $period;
    }

    public function isCurrentPeriod(string $period): bool
    {
        return $this->defaultPeriod === $period;
    }


}
