<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'fname' => 'required|max:50',
            'lname'=>'nullable|max:50',
            'phone1'=>'required|min:3|max:12',
            'phone2'=>'nullable|min:3|max:12',
            'phone3'=>'nullable|min:3|max:12',
           'company'=>'nullable|max:50',
            'email'=>'nullable|max:100|email',
            'address' =>'nullable|max:100',
            'link' =>'nullable|max:150|url',
           'bday' =>'nullable',
            'notes'=>'nullable|max:100'
        ];
    }
    public function messages()
    {
        
        return [
            'fname.required' => 'First Name is required!',
            'phone1.required' => 'First Phone Number is required!',
            'email.email' => 'Enter a valid email id!!!'
        ];
    }
}
