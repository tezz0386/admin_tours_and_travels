<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            //
            'name'=>'required|unique:packages',
            'package_category'=>'required',
            'thumbnail'=>'required|mimes:jpg,jpeg,png',
            'summary'=>'required',
            'title_tag'=>'required',
            'start_from'=>'required',
            'duration_days'=>'required|integer',
            'duration_nights'=>'required|integer',
            'difficulty'=>'required',
        ];
    }
}
