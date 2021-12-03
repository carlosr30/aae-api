<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
                'max:100'
            ],

            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'required',
                'date',
                'after:start_date'
            ],

            'event_days' => [
                'required',
                'array'
            ],

            'event_days.*' => [
                'required',
                'integer',
                'min:0',
                'max:6'
            ]
        ];
    }

    public function messages() {
        return [
            'start_date.required' => 'The range field is required.',
            'end_date.required' => 'The range field is invalid.',
            'event_days.required' => 'Please select a day'
        ];
    }
}
