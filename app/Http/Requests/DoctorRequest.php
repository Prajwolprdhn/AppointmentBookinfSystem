<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'lisence_no' => 'required|integer',
            'first_name' => 'required',
            'last_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|string|min:8',
            'password_confirmation' => 'required',
            'gender' => 'required|string|max:255',
            'department_id' => 'required',
            'role' => 'nullable',
        ];
    }
}
