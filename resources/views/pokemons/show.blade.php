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
                <th class="fixed-width" colspan="2">Base statistics</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="fixed-width">
                    HP
                </td>
                <td class="fixed-width">
                    {{ $pokemon->hp }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Attack
                </td>
                <td class="fixed-width">
                    {{ $pokemon->attack }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Defense
                </td>
                <td class="fixed-width">
                    {{ $pokemon->defense }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Special attack
                </td>
                <td class="fixed-width">
                    {{ $pokemon->special_attack }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Special defense
                </td>
                <td class="fixed-width">
                    {{ $pokemon->special_defense }}
                </td>
            </tr>
            <tr>
                <td class="fixed-width">
                    Speed
                </td>
                <td class="fixed-width">
                    {{ $pokemon->speed }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    </body>
@endsection
