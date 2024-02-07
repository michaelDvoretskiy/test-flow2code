<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class MovieReviewDataRequest extends FormRequest
{
    use ValidationErrorTrait;
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
            'movieId' => [
                'required',
                'int',
                Rule::exists('movies', 'id'),
                Rule::unique('movie_reviews', 'movie_id')->where('username', $this->input('username'))
            ],
            'mark' => 'required|int|min:0|max:10',
            'description' => 'required|string|min:5|max:300',
            'username' => 'required|string|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'movieId.unique' => 'Review for selected movie from selected usernme already exists.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $this->throwValidationException($validator);
    }
}
