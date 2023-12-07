<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoansRequest extends FormRequest
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
            'book_id' => 'required|exists:books,id',
            'user_name' => 'required|string|max:100',
            'loan_date' => 'required|date',
            'return_date' => 'required|date',
        ];
    }
}
