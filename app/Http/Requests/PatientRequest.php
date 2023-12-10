<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|email',
            // 'dob' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'g-recaptcha-response' => 'required|captcha'
            // 'image' => 'required|image|size:3072'
        ];
    }
}
