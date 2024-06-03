<?php

namespace Database\Factories;

use App\Models\PricingPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PricingPeriod>
 */
class PricingPeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pricing_plan = PricingPlan::inRandomOrder()->first();

        return [
            'pricing_plan_id' => $pricing_plan,
            'start_date' => $this->faker->dateTimeBetween(startDate: '-1 years', endDate: 'now'),
            'end_date' => $this->faker->dateTimeBetween(startDate: 'now', endDate: '+1 years'),
        ];
    }
}
