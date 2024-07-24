<?php

namespace App\Http\Requests;

use App\Enums\PagesEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GetPageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

        public function prepareForValidation()
    {
        $this->merge(['type' => $this->type]);
    }

    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in(array_column(PagesEnum::cases(), 'value'))]
        ];
    }
}
