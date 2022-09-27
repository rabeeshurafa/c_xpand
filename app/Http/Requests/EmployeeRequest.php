<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'Name' => 'required|string',
            'NationalID' => 'required|min:9',
            'NickName' => 'required|string',
            'DepartmentID' => 'required',
            'Position' => 'required|numeric|exists:t_constant,id',
            'JobType' => 'required|numeric|exists:t_constant,id',
            'HiringDate' => 'required',
            'MobileNo1' => 'required|min:10',
            //'DirectManager' => 'required|numeric',
            'email' => 'nullable|email| unique:admins',
        ];
    }
}
