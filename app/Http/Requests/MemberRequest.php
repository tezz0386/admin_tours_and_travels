<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'image'=>'required|mimes:jpg,png,jpeg',
            'designation'=>'required',
            'summary'=>'required',
            'facebook_link'=>'required',
            'address'=>'required',
            'contact_no'=>'required|min:9|max:14|unique:members',
            'email'=>'required|unique:members',
        ];
    }
}
