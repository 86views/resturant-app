<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],  
            'email' => ['required', 'email'],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'table_id' => ['required'],
            'guest_number' => ['required'],
        ];
    }
}
