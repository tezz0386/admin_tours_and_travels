<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:settings',
            'contact_no'=>'required|unique:settings',
            'toll_free'=>'required|unique:settings',
            'logo'=>'required|mimes:jpg,jpeg,png',
            'icon'=>'required|mimes:jpg,jpeg,png',
            'address'=>'required',
            'location'=>'required',
            'open_time'=>'required',
            'close_time'=>'required',
            'close_day'=>'required',
            'summary'=>'required',
            'description'=>'required',
            'title_tag'=>'required',
            'meta_keywords'=>'required',
            'meta_description'=>'required',
        ];
    }
}
