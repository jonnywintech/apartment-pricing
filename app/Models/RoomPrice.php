<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPrice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pricingPeriod()
    {
        return $this->belongsTo(PricingPeriod::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
