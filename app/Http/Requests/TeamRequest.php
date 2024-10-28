<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:30',
            'selected_pokemons' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The team name is required!',
            'name.min' => 'The team name must be at least 5 characters!',
            'name.max' => 'The team name may not be greater than 30 characters!',
        ];
    }
}
