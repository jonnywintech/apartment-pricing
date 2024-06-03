<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomPrice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['pricing_period_id', 'room_type_id', 'price'];

    public function pricingPeriod()
    {
        return $this->belongsTo(PricingPeriod::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
