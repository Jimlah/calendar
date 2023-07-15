<?php

namespace App\Actions;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class DayPeriod extends Period implements \App\Interfaces\HasMatrix
{

    public function matrix(): Collection
    {
        return collect(range(0, 23));
    }
}
