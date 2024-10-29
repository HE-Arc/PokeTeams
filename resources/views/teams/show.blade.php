@extends("layout.app")

@section("content")
    <!DOCTYPE html>
<html>
<head>
    <title>Team List</title>
</head>
<body>
<div class="container mt-5">
    <h1>{{ $team->name }}</h1>

    <a href="{{ route('teams.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i> Back to Teams</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Types</th>
        </tr>
        </thead>
        <tbody>
        @foreach($team->pokemons as $pokemon)
            <tr>
                <td>{{ $pokemon->name }}</td>
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
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection
