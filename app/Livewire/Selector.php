<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\RoomPrice;
use App\Models\PricingPlan;
use App\Models\PricingPeriod;
use Illuminate\Support\Facades\DB;

class Selector extends Component
{
    public $pricing_plan_id = '';

    public $pricing_period_modal_id = '';

    // form data insert

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

        array_push($this->dates, $this->convertDate($pricing_period_modal->start_date));
        array_push($this->dates, $this->convertDate($pricing_period_modal->end_date));

        foreach ($pricing_period_modal->roomPrices as $room_prices) {
            array_push($this->room_names, $room_prices->roomType->name);
            array_push($this->room_prices_ids, $room_prices->id);
            array_push($this->room_prices, $room_prices->price);
        }
    }

    public function update()
    {
        DB::beginTransaction();
        try {
            if(count($this->room_prices_ids) !== count($this->room_prices) ){
                return redirect()->back()->with('status_message', 'Please fill all fields');
            }

            for ($i = 0; $i < count($this->room_prices_ids); $i++) {
                $room_price = RoomPrice::find($this->room_prices_ids[$i]);
                $room_price->price = $this->room_prices[$i];
                $room_price->save();
            }

            session()->flash('status_message', 'Successfully updated price');

            DB::commit();

            $this->clearData();
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error_message', 'An error occurred while updating the pricing plan');
        }

    }

    public function convertDate($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
    }

    public function render()
    {

        $pricing_periods = [];

        $pricing_period_modal = [];

        if ($this->pricing_plan_id !== '') {
            try {
                $pricing_periods = PricingPeriod::where('pricing_plan_id', $this->pricing_plan_id)->get();

                foreach($pricing_periods as $pricing_period){
                    $pricing_period->start_date = Carbon::createFromFormat('Y-m-d', $pricing_period->start_date)->format('d-m-Y');
                    $pricing_period->end_date = Carbon::createFromFormat('Y-m-d', $pricing_period->end_date)->format('d-m-Y');
                }

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
