<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageCategoryUpdateRequest extends FormRequest
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
            'name'=>'required|unique:package_categories,name,'.$this->packageCategory->id,
            'image'=>'mimes:jpg,jpeg,png',
            'summary'=>'required',
        ];
    }
}
