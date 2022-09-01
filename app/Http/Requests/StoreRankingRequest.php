<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRankingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'growt_rate_weight_value' => ['required'],
            'light_demand_weight_value' => ['required'],
            'co2_demand_weight_value' => ['required'],
            'hardness_tolerance_weight_value' => ['required'],
            'demands_weight_value' => ['required'],
            'temperature_weight_value' => ['required'],

            'tank_length' => ['required','numeric', 'min:0'],
            'tank_width' => ['required','numeric', 'min:0'],
            'tank_height' => ['required','numeric', 'min:0'],
            'lighting' => ['required','numeric', 'min:0'],
            'co2' => ['required'],
            'temperature' => ['required', 'numeric', 'min:10', 'max:32'],
            'ph' => ['required', 'numeric', 'min:5', 'max:9'],
            'hardness_tolerance' => ['required'],
        ];
    }
}
