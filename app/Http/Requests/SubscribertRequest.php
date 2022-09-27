<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribertRequest extends FormRequest
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
            'formDataNameAR' => 'required|string',
        ];
    }
    
    public function messages()
    {
        return [
            'formDataNameAR.required'     => trans('error_messages.name_required'),
        ];
    }
}
