@extends("layout.app")

@section("content")
<div class="container mt-5">
    <h1>Team List</h1>

    <a href="{{ route('teams.create') }}" class="btn btn-primary float-right mb-2"><i class="bi bi-plus-square-fill"></i> Add new Team</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Creator</th>
            <th>Pokemons</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td><h5>{{ $team->name }}</h5></td>
                <td>{{ $team->user->name }}</td>
                <td style="width: 50%">
                    <ul>
                        @foreach($team->pokemons as $pokemon)
                            <img height="80px" style="aspect-ratio: 1/1; object-fit: contain" src="/images/pokemon_sprites/{{$pokemon->sprite}}" alt="Sprite of {{$pokemon->name}}">
                        @endforeach
                    </ul>
                </td>
                <td style="width: 12%">
                    <a href="{{ route('teams.show', $team->id) }}" class="btn btn-info">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
