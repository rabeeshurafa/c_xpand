<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
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
            'NationalID' => 'required',
            'NickName' => 'required|string',
            'DepartmentID' => 'required',
            'Position' => 'required|numeric|exists:job_titles,id',
            // 'JobType' => 'required|numeric|exists:job_types,id',
            // 'HiringDate' => 'required|date',
            'MobileNo1' => 'required|numeric',
            // 'DirectManager' => 'required|numeric',
            // 'email' => 'nullable|email| unique:admins',
        ];
    }
}
