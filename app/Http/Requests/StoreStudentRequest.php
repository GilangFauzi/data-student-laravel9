<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'nim' => 'required|unique:students|max:15|numeric',
            // 'name' => 'required',
            // 'gender' => 'required',
            // 'class_id' => 'required',
            // 'image' => 'image|file|max:1024'
        ];
    }
    // todo costum message
    public function messages()
    {
        return [
            'nim.numeric' => 'NIM harus di isi dengan angka',
            'body.required' => 'A message is required',
        ];
    }
    // todo merubah class_id menjadi class biasa
    public function attributes()
    {
        return [
            'class_id' => 'class',
        ];
    }
}