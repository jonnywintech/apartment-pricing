<?php

namespace App\Livewire;

use App\Models\PricingPeriod;
use Livewire\Component;
use App\Models\RoomPrice;
use App\Models\PricingPlan;

class Selector extends Component
{
    public $pricing_plan_id = '';

    public $pricing_period_modal_id = '';

    // form

    public $room_names = [];
    public $room_prices_ids = [];
    public $room_prices = [];
    public $dates = [];

    public function clearData()
    {
        $this->room_names = [];
        $this->room_prices_ids = [];
        $this->room_prices = [];
        $this->dates = [];
        $this->pricing_period_modal_id = '';
    }

    public function openModal(string $id)
    {
        $this->pricing_period_modal_id = $id;
        $pricing_period_modal = PricingPeriod::where('id', $this->pricing_period_modal_id)->first();

        array_push($this->dates, $pricing_period_modal->start_date);
        array_push($this->dates, $pricing_period_modal->end_date);

        foreach ($pricing_period_modal->roomPrices as $room_prices) {
            array_push($this->room_names, $room_prices->roomType->name);
            array_push($this->room_prices_ids, $room_prices->id);
            array_push($this->room_prices, $room_prices->price);
        }
        // dd($pricing_period_modal);
    }

    public function render()
    {

        $pricing_periods = [];

        $pricing_period_modal = [];

        if ($this->pricing_plan_id !== '') {
            try {
                $pricing_periods = PricingPeriod::where('pricing_plan_id', $this->pricing_plan_id)->get();
            } catch (\Throwable $th) {
                info('error happened: ' . $th->getMessage());
            }
        }

        $pricing_plans = PricingPlan::all();
        return view('livewire.selector', [
            'pricing_plans' => $pricing_plans,
            'pricing_periods' => $pricing_periods,
        ]);
    }
}
