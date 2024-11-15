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
            'name' => 'required|min:5|max:40',
            'selected_pokemons.*' => 'exists:pokemons,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The team name is required!',
            'name.min' => 'The team name must be at least 5 characters!',
            'name.max' => 'The team name may not be greater than 40 characters!',
            'selected_pokemons.max' => 'You can only select up to 6 Pokémon for a team!',
            'selected_pokemons.*.exists' => 'Some of the selected Pokemon are not valid.',
        ];
    }
}
