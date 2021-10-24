<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name'=>'required|unique:categories,name,'.$this->category->id,
            'image'=>'mimes:jpg,jpeg,png',
            'summary'=>'required',
            'title_tag'=>'required|unique:categories,title_tag,'.$this->category->id,
            'meta_keywords'=>'required',
            'meta_description'=>'required',
        ];
    }
}
