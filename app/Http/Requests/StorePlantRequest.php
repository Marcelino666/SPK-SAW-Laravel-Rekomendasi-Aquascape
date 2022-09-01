<?php

namespace App\Http\Requests;

use App\Rules\NotNullChecker;
use App\Rules\StringRangeChecker;
use Illuminate\Foundation\Http\FormRequest;

class StorePlantRequest extends FormRequest
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
            'name' => ['required','unique:plants,name'],
            'type' => ['required','string'],
            'placement_area' => ['required','string'],
            'light_demand' => ['required','string'],
            'co2_demand' => ['required','string'],
            'hardness_tolerance' => ['required','string'],
            'ph_tolerance' => ['required', new NotNullChecker, new StringRangeChecker],
            'temperature' => ['required', new NotNullChecker, new StringRangeChecker],
            'growth_height' => ['nullable'],
            'growth_width' => ['nullable'],
            'growt_rate' => ['required'],
            'demands' => ['required'],
        ];
    }
}
