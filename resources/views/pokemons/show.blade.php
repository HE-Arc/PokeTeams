@extends("layout.app")

@section("content")

    <body>
    <div class="container mt-5">
        <h1>{{ $pokemon->name }}</h1>

        <a href="{{ route('pokemons.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i> Back to Pokemons</a>

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
                            {{ $pokemon->type1->name }}
                        </span>
                            @if ($pokemon->type2)
                                <span class="type-tag" style="background-color: {{ $pokemon->type2->color }};">
                                {{ $pokemon->type2->name }}
                            </span>
                            @endif
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </body>
@endsection
