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

    protected function prepareForValidation()
    {
        $reservation_date_time = ($this->filled(['date', 'time'])) ? $this->date . ' '. $this->time : '';
        $this->merge([
            'reservation_date_time' => $reservation_date_time
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reservation_date' => 'required|date|after:yesterday',
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
