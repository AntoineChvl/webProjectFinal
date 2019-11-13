<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//return User::auth() ? User::auth()->statusLvl==2 : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:32',
            'price' => 'required|gte:0',
            'description' => 'required|min:20',
            'image' => 'required|file|image|max:5000|mimes:jpeg,jpg,png,gif',
        ];
    }
}
