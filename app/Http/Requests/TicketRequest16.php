<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest16 extends FormRequest
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
            'subscriber_name' => 'required|string',
            'subscriber_id' => 'required|numeric|exists:admins,id',
            'malDesc' => 'required', 
            'vac_type' => 'required|numeric', 
        ];
    }
}
