<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'reservation_date' => 'required|after:yesterday',
            'reservation_time' => 'required|after:now',
            'reservation_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.required' => '日付を指定してください',
            'reservation_date.after' => '予約日を過ぎています',
            'reservation_time.required' => '時間を指定してください',
            'reservation_time.after' => '予約時間を過ぎています',
            'reservation_number.required' => '人数を指定してください',
        ];
    }
}
