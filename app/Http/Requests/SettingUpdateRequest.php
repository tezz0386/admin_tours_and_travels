<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'email'=>'required|unique:settings,email,'.$this->setting->id,
            'contact_no'=>'required|unique:settings,contact_no,'.$this->setting->id,
            'toll_free'=>'required|unique:settings,toll_free,'.$this->setting->id,
            'logo'=>'mimes:jpg,jpeg,png',
            'icon'=>'mimes:jpg,jpeg,png',
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
