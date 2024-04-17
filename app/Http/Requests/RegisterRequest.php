<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonenumber' => ['required','numeric'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirm' => ['required', 'string', 'min:8',Rule::in([$this->input('password')])],
        ];
    }
    // public function messages(): array
    // {
    //     // return [
    //     //     'password.required' => 'Please enter a password.',
    //     //     'password.min' => 'Password must contain at least 8 characters.',
    //     //     'password_confirm' => 'Please enter a password',
    //     //     'password_confirm.min' => 'Password must contain at least 8 characters.'
    //     // ];
    // }
}
