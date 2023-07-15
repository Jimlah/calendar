<?php

namespace App\Actions;

class Period
{
    public function __construct(
        public \DateTimeImmutable $date = new \DateTimeImmutable()
    ){}
}
