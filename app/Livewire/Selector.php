<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PricingPlan;

class Selector extends Component
{
    public $pricing_plan_id;

    public function render()
    {
        $pricing_plans = PricingPlan::all();
        return view('livewire.selector', compact('pricing_plans'));
    }
}
