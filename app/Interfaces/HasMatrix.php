<?php

namespace App\Interfaces;


use Illuminate\Support\Collection;

interface HasMatrix
{
    public function matrix(): Collection;
}
