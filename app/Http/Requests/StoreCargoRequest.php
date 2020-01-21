<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCargoRequest extends FormRequest
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
            'name' => [
                'required',
            ],
            'weight'=> [
                'numeric',
            ],
            'from_city_id'=> [
                'integer',
            ],
            'to_city_id'=> [
                'integer',
            ],
            'delivery_date'=> [
                'required',
            ],
        ];
    }
}
