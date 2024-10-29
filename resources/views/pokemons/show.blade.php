@extends("layout.app")

@section("content")

    <body>
    <div class="container mt-5">
        <h1>{{ $pokemon->name }}</h1>

        <a href="{{ route('pokemons.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i>
            Back to Pokemons</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="fixed-width">Types</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="fixed-width">
                    <div class="type-wrapper">
                        <span class="type-tag" style="background-color: {{ $pokemon->type1->color }};">
                            {{ strtoupper($pokemon->type1->name) }}
                        </span>
                        @if ($pokemon->type2)
                            <span class="type-tag" style="background-color: {{ $pokemon->type2->color }};">
                                {{ strtoupper($pokemon->type2->name) }}
                            </span>
                        @endif
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="fixed-width">Statistics</th>
                <th class="fixed-width">Base</th>
                <th class="fixed-width">Min</th>
                <th class="fixed-width">Max</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="fixed-width">
                    HP
                </td>
                <td class="fixed-width">
                    {{ $pokemon->base_hp }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->min_hp }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->max_hp }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Attack
                </td>
                <td class="fixed-width">
                    {{ $pokemon->base_attack }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->min_attack }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->max_attack }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Defense
                </td>
                <td class="fixed-width">
                    {{ $pokemon->base_defense }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->min_defense }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->max_defense }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Special attack
                </td>
                <td class="fixed-width">
                    {{ $pokemon->base_special_attack }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->min_special_attack }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->max_special_attack }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Special defense
                </td>
                <td class="fixed-width">
                    {{ $pokemon->base_special_defense }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->min_special_defense }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->max_special_defense }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Speed
                </td>
                <td class="fixed-width">
                    {{ $pokemon->base_speed }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->min_speed }}
                </td>
                <td class="fixed-width">
                    {{ $pokemon->max_speed }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    </body>
@endsection
