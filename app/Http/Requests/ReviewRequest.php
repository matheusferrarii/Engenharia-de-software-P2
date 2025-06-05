<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rating' => 'required|integer|min:0|max:5',
            'text' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ];
    }
}