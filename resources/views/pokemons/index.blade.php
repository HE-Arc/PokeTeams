@extends("layout.app")

@section("content")
<!DOCTYPE html>
<html>
<head>
    <title>Pokemon List</title>
</head>
<body>
<div class="container mt-5">
    <h1>Pokemon List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pokemons as $pokemon)
            <tr>
                <td>{{ $pokemon->name }}</td>
                <td>{{ $pokemon->type1->name }} {{ $pokemon->type2 ? $pokemon->type2->name : '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

@endsection
