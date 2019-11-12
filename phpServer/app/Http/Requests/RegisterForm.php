<?php

namespace App\Http\Requests;

use App\Rules\UniqueEmail;
use Illuminate\Foundation\Http\FormRequest;

class RegisterForm extends FormRequest
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
            'firstName' => 'required|min:3|max:16|alpha',
            'lastName' => 'required|min:3|max:25|alpha',
            'campus' => 'required',
            'email' => ['required','email',new UniqueEmail],
            'password' => 'required|min:6|max:32|confirmed|regex:/.*[0-9].*/i|regex:/.*[A-Z].*/i',
            'password_confirmation' => 'required',
            'legalIssuesConsent' => 'required',
        ];
    }
}
