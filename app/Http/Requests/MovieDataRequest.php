<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class MovieDataRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:100',
            'description' => 'required|string|min:5|max:500',
            'countryId' => [
                'required',
                'int',
                Rule::exists('countries', 'id'),
            ],
            'types' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    foreach ($value as $id) {
                        if (!is_int($id)) {
                            $fail("The $attribute must contain only integers.");
                        }
                    }
                },
                Rule::exists('movie_types', 'id')
            ]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ])->setStatusCode(422)
        );
    }
}
