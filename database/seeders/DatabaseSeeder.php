<?php

namespace Database\Seeders;

use App\Models\PricingPeriod;
use App\Models\PricingPlan;
use App\Models\RoomPrice;
use App\Models\RoomType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

/// arrangement type
        PricingPlan::factory()->create([
            'name' => 'Default prices',
        ]);

        PricingPlan::factory()->create([
            'name' => 'Breakfast included',
        ]);

        PricingPlan::factory()->create([
            'name' => 'Last minute',
        ]);

// room types
        RoomType::factory()->create([
            'name' => 'Single room',
        ]);

        RoomType::factory()->create([
            'name' => 'Double room',
        ]);

        RoomType::factory()->create([
            'name' => 'Deluxe room',
        ]);


        PricingPeriod::factory(10)->create();

        $this->call(RoomPriceSeeder::class);
    }
}
