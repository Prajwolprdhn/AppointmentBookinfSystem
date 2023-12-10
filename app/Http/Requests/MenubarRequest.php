<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenubarRequest extends FormRequest
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
        $doctor = $this->route('menubar.index');
        if ($this->isMethod('PUT')) {
            return [
                'status' => 'required',
                'name' => 'required',
                'display_order' => 'required|max:15',
                'type' => 'required',
            ];
        } else {
            return [
                'status' => 'required',
                'name' => 'required',
                'display_order' => 'required|max:15',
                'type' => 'required',
            ];
        }
    }
}