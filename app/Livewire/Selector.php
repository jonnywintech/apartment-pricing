<?php

namespace App\Livewire;

use App\Models\PricingPeriod;
use Livewire\Component;
use App\Models\RoomPrice;
use App\Models\PricingPlan;

class Selector extends Component
{
    public $pricing_plan_id = '';

    public function render()
    {

        $pricing_periods = [];

        if($this->pricing_plan_id !== ''){
            try {
                $pricing_periods = PricingPeriod::where('pricing_plan_id', $this->pricing_plan_id)->get();
            } catch (\Throwable $th) {
            }

        }

        $pricing_plans = PricingPlan::all();
        return view('livewire.selector', compact('pricing_plans', 'pricing_periods'));
    }
}
