@extends("layout.app")

@section("content")
    <div class="container mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">
            <i class="bi bi-arrow-return-left"></i> Back <!-- TODO: fix après ajout -->
        </a>

        <div class="card p-4 pt-4 mb-3">
            <div class="text-center mb-3">
                <h1 class="mb-4">Add <strong>{{ $pokemonToAdd->name }}</strong> to your Teams</h1>
                <img src="/images/pokemon_sprites/{{ $pokemonToAdd->sprite }}"
                     alt="Sprite of {{ $pokemonToAdd->name }}"
                     class="mx-auto"
                     style="aspect-ratio: 1/1; object-fit: contain; height: 250px;">
            </div>
            <hr>
            <div class="type-wrapper">
                    <span class="card-type" style="background-color: {{ $pokemonToAdd->type1->color }};">
                        {{ strtoupper($pokemonToAdd->type1->name) }}
                    </span>
                @if ($pokemonToAdd->type2)
                    <span class="card-type" style="background-color: {{ $pokemonToAdd->type2->color }};">
                        {{ strtoupper($pokemonToAdd->type2->name) }}
                    </span>
                @endif
            </div>
        </div>

        @if($teamsOfUser->isEmpty())
            <p>No teams found.</p>
        @else
            <div class="row g-4">
                @foreach($teamsOfUser as $team)
                    <div class="col-12">
                        <div class="card px-4 py-1">
                            <div class="row g-0 align-items-center">

                                <div class="col-md-3">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">{{ $team->name }}</h4>
                                    </div>
                                </div>

                                <div class="col-md-8 d-flex justify-content-start align-items-center p-3">
                                    @if($team->pokemons->isEmpty())
                                        <p class="text-muted mb-0">No Pokémon in this team.</p>
                                    @else
                                        <div class="d-flex flex-wrap gap-3">
                                            @foreach($team->pokemons as $pokemon)
                                                <img src="/images/pokemon_sprites/{{$pokemon->sprite}}"
                                                     alt="Sprite of {{ $pokemon->name }}"
                                                     style="width: 100px; height: 100px; object-fit: contain;">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-1 d-flex flex-column justify-content-center align-items-center gap-2 p-3">
                                    <form action="{{ route('teams.add-pokemon-to', ['pokemon' => $pokemonToAdd, 'team' => $team]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-actions">
                                            <i class="bi bi-plus-square-fill"></i>
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
