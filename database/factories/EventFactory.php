<?php

namespace Database\Factories;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startOfMonth = CarbonImmutable::create(now())->startOfMonth();
        $endOfMonth = $startOfMonth->endOfMonth();
        $startOfWeek = $startOfMonth->startOfWeek(CarbonInterface::SUNDAY);
        $endOfWeek = $endOfMonth->endOfWeek(CarbonInterface::SATURDAY);
        $date = $this->faker->randomElement($startOfWeek->toPeriod($endOfWeek)->toArray());
        $end = $date->add(CarbonInterval::hour(1));

        return [
            'name' => 'New Event',
            'start_at' => $date,
            'end_at' => $end,
            'is_all_day' => $this->faker->boolean,
        ];
    }

}
