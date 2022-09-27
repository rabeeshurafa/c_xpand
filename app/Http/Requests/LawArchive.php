<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LawArchive extends FormRequest
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
            //'customerName' => 'required',
            'archive_type' => 'required',
            //'customerid' => 'required',
            // "formDataaaUploadFile"    => "nullable|array",
            // "formDataaaUploadFile.*"  => "nullable|mimes:jpeg,png,jpg,gif
            // ,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,svg,pdf|max:2048",
        ];
    }
}
