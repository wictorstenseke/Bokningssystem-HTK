<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReservationRequest extends Request
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
            'start_date'    => 'required',
            'start_time'    => 'required',
            'stop_time'     => 'required',
            'name'          => 'required',
        ];
    }

    /**
    * Custom messages
    *
    * @return array
    */
    public function messages()
    {
        return [
            'start_date.required'    => 'Du måste ange vilken dag du tänkt spela',
            'start_time.required'    => 'Du måste ange vilken tid du tänkt spela',
            'stop_time.required'     => 'Du måste ange vilken tid du tänkt sluta spela',
            'name.required'          => 'Du måste ange vem som ska hyra banan',
        ];
    }
}
