<?php

namespace App\Http\Requests;

use App\Models\PricingPlan;
use App\Models\RoomType;
use Illuminate\Foundation\Http\FormRequest;

class PricingPeriodStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $room_types = RoomType::all();


        return [
            'pricing_plan_id' => ['required', 'exists:' . PricingPlan::class . ',id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'room_price' => ['required', 'array'],
            'room_price.*' => ['required', 'numeric', 'min:1', 'max:9999999999999999999999999999'],
            'room_type_id' => ['required'],
            'room_type_id.*'=> ['required'],
        ];
    }
}
