<?php

namespace Database\Seeders;

use App\Models\PricingPlan;
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

        PricingPlan::factory()->create([
            'name' => 'Default prices',
            'is_deleted' => 0,
        ]);

        PricingPlan::factory()->create([
            'name' => 'Breakfast included',
            'is_deleted' => 0,
        ]);

        PricingPlan::factory()->create([
            'name' => 'Last minute',
            'is_deleted' => 0,
        ]);


        RoomType::factory()->create([
            'name' => 'Single room',
            'is_deleted' => 0,
        ]);

        RoomType::factory()->create([
            'name' => 'Double room',
            'is_deleted' => 0,
        ]);

        RoomType::factory()->create([
            'name' => 'Deluxe room',
            'is_deleted' => 0,
        ]);
    }
}
