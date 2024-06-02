<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingPeriodController extends Controller
{
  public function create(string $id)
  {
    return view('pricing_period.create', compact('id'));
  }
}
