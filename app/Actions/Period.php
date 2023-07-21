<?php

namespace App\Actions;


use App\Interfaces\HasMatrix;
use Carbon\CarbonImmutable;

abstract class Period implements HasMatrix
{
    public function __construct(
        public ?CarbonImmutable $date
    ){
        $this->date ??= CarbonImmutable::now();
    }

    public function getStart(): CarbonImmutable
    {
        return $this->matrix()->first()->first();
    }

    public function getEnd(): CarbonImmutable
    {
        return $this->matrix()->last()->last();
    }
}
