<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserLocationCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required | integer | gte:1',
            'park_id' => 'required | integer | gte:1',
            'longitude' => 'required | numeric',
            'latitude' => 'required | numeric',
            'number_of_people'=>'integer | gte:1',
            'time_diff'=>'numeric |gte:1',
            'start_time'=>'numeric',
            'end_time'=>'numeric | after:start_time',
        ];
    }
}
