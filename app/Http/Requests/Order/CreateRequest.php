<?php
declare(strict_types=1);

namespace App\Http\Requests\Order;

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
            'email' => ['required','string','email:rfc,dns'],
            'phone' => ['required','string','min:11'],
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
			'email' => 'Электронный адрес',
            'phone' => 'Телефон'
		];
	}
}
