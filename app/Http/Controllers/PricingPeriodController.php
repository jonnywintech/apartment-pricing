<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use App\Models\RoomType;
use Illuminate\Http\Request;

class PricingPeriodController extends Controller
{
  public function create(string $id)
  {

   $pricing_plan_id = $id;

    $room_types = RoomType::all();

    $pricing_plans = PricingPlan::all();

    return view('pricing_period.create', compact('pricing_plan_id', 'pricing_plans', 'room_types'));
  }
}
