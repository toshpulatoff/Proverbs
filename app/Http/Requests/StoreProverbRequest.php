<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProverbRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        $rules = [
            'oz.content' => 'required',
            'uz.content' => 'required',
            'en.content' => 'required',
            'ru.content' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.content'] = 'string';
        }

        return $rules;
    }
}
