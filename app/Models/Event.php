<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
      'name',
      'start_at',
      'end_at',
      'is_all_day'
    ];

    protected $casts = [
        'name' => 'string',
        'start_at' => 'immutable_datetime',
        'end_at' => 'immutable_datetime',
        'is_all_day' => 'boolean'
    ];
}
