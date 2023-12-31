<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'publication_year' => [
                'required',
                'integer',
                'min:1800',
                'max:' . date('Y'),
                function ($attribute, $value, $fail) {
                    if ($value < 1800 || $value > date('Y')) {
                        $fail($attribute . ' está fuera del rango permitido.');
                    }
                },
            ],
        ];
    }
}
