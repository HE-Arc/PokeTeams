@extends("layout.app")

@section("content")

    <div class="container mt-5">
        <h1>Team List</h1>

        <a href="{{ route('teams.create') }}" class="btn btn-primary float-right mb-3">
            <i class="bi bi-plus-square-fill"></i> Add new Team
        </a>

        @if($teams->isEmpty())
            <p>No teams found.</p>
        @else
            <div class="row g-4">
                @foreach($teams as $team)
                    <div class="col-12">
                        <div class="card px-4 py-1">
                            <div class="row g-0 align-items-center">

                                <div class="col-md-3">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">{{ $team->name }}</h4>
                                        <p class="card-text">
                                            <strong>Creator:</strong> {{ $team->user->name }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-8 d-flex justify-content-start align-items-center p-3">
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($team->pokemons as $pokemon)
                                            <img src="/images/pokemon_sprites/{{$pokemon->sprite}}"
                                                 alt="Sprite of {{ $pokemon->name }}"
                                                 style="width: 100px; height: 100px; object-fit: contain;">
                                        @endforeach
                                    </div>
                                </div>

                                @php
                                    $queryParams = ['team' => $team->id];
                                    foreach ($team->pokemons as $index => $pokemon) {
                                        $queryParams["pokemon_" . ($index + 1)] = $pokemon->id;
                                    }
                                @endphp

                                <div class="col-md-1 d-flex flex-column justify-content-center align-items-center gap-2 p-3">
                                    <a href="{{ route('teams.show', $team->id) }}" class="btn btn-info btn-icon btn-actions">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('teams.edit', $queryParams) }}" class="btn btn-warning btn-icon btn-actions">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon btn-actions">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
