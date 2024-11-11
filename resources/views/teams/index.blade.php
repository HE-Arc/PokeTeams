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
                <td><a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a></td>
                <td>{{ $team->user->name }}</td>
                <td>
                    <ul>
                        @foreach($team->pokemons as $pokemon)
                            <li>{{ $pokemon->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="w-25">
                    <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-info">
                        <i class="bi bi-pencil-fill"></i> Edit
                    </a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
