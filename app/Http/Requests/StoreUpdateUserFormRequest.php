<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $id = $this->id ?? '';

        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'email',
                "unique:users,email,{$id},id",
            ],
            'password' => [
                'required',
                'min:6',
                'max:15',
            ],
            'image' => [
                'nullable',
                'image',
                'max:1024',
            ],
        ];

        if ($this->method('PUT')){
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:15',
            ];
        }
        return $rules;
    }
}
