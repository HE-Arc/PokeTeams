@extends("layout.app")

@section("content")
    <!DOCTYPE html>
<html>
<head>
    <title>Team List</title>
</head>
<body>
<div class="container mt-5">
    <h1>Team List</h1>

    <a href="{{ route('teams.create') }}" class="btn btn-primary float-right mb-2"><i class="bi bi-plus-square-fill"></i> Add new Team</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Pokemons</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>
                    <ul>
                        @foreach($team->pokemons as $pokemon)
                            <li>{{ $pokemon->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection
