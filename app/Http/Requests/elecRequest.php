<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class elecRequest extends FormRequest
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
            'customerName' => 'required',
            'customerId' => 'required|numeric|exists:users,id',
            'subscription_no' => 'required',
        ];
    }
}
