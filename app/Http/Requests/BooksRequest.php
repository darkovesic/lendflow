<?php

namespace App\Http\Requests;

use App\Rules\Isbn;
use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'author' => 'nullable|string',
            'isbn' => ['nullable', 'array', new Isbn],
            'title' => 'nullable|string',
            'offset' => 'nullable|integer|max:50',
        ];
    }
}
