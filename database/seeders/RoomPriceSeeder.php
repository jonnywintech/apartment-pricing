<?php

namespace Database\Seeders;

use App\Models\RoomType;
use App\Models\RoomPrice;
use App\Models\PricingPeriod;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pricing_periods = PricingPeriod::all();
        $room_types = RoomType::all();

        foreach ($pricing_periods as $pricing_period) {

            foreach ($room_types as $room_type) {
                RoomPrice::factory()->create([
                    'pricing_period_id' => $pricing_period->id,
                    'room_type_id' => $room_type->id,
                ]);
            }
        }
    }
}
