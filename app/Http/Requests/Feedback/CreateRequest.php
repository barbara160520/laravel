<?php
declare(strict_types=1);

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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

			'firstName' => ['required', 'string', 'min:5'],
            'lastName' => ['required', 'string', 'min:5'],
			'message' => ['required', 'string', 'max:1000']
        ];
    }

	public function messages(): array
	{
		return [
			'required' => 'Необходимо заполнить поле :attribute.'
		];
	}

	public function  attributes(): array
	{
		return [
			'firstName' => 'Имя',
            'lastName' => 'Фамилия',
			'message' => 'Сообщение'
		];
	}
}
