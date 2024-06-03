<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RoomType;
use App\Models\RoomPrice;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use App\Models\PricingPeriod;
use App\Http\Requests\PricingPeriodStoreRequest;

class PricingPeriodController extends Controller
{
    public function create(string $id)
    {

        $pricing_plan_id = $id;

        $room_types = RoomType::all();

        $pricing_plans = PricingPlan::all();

        return view('pricing_period.create', compact('pricing_plan_id', 'pricing_plans', 'room_types'));
    }

    public function store(PricingPeriodStoreRequest $request)
    {

        $pricing_data = $request->only('pricing_plan_id', 'start_date', 'end_date');

        $pricing_data['start_date'] = $this->convertDate($pricing_data['start_date']);
        $pricing_data['end_date'] = $this->convertDate($pricing_data['end_date']);

        $pricing_period = PricingPeriod::create($pricing_data);

        $room_prices = $request->only('room_price')['room_price'];

        for ($i = 0; $i < count($room_prices); $i++) {

            $room_type_id = $i + 1;

            $data = [
                'pricing_period_id' => $pricing_period->id,
                'room_type_id' => $room_type_id,
                'price' => $room_prices[$i],
            ];

            RoomPrice::create($data);
        }

        return redirect()->back()->with('status_message', 'Successfully created pricing plan for selected date.');
    }

    public function convertDate($date)
    {
        return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
    }
}
