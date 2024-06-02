<?php

namespace App\Models;

use App\Models\RoomPrice;
use App\Models\PricingPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricingPeriod extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pricingPlan()
    {
        return $this->belongsTo(PricingPlan::class);
    }

    public function roomPrices()
    {
        return $this->hasMany(RoomPrice::class);
    }

}
