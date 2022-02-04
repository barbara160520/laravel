<?php
declare(strict_types=1);

namespace App\Http\Requests\Source;

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

			'title' => ['required', 'string', 'min:5'],
			'url' => ['required', 'string', 'min:10']
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
			'title' => 'Наименование',
			'url' => 'Адрес'
		];
	}
}
