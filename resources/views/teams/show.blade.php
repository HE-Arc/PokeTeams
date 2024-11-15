@extends("layout.app")

@section("content")
    <div class="container mt-5">
        <h1>{{ $team->name }}</h1>

        <p><strong>Creator :</strong> {{ $team->user->name }}</p>

        <a href="{{ route('teams.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i> Back
            to Teams</a>

        <div class="d-flex flex-wrap justify-content-center">
        @foreach($team->pokemons as $pokemon)
            <div class="card m-1">
                <img class="card-img-top" src="/images/pokemon_sprites/{{$pokemon->sprite}}" alt="Sprite of {{$pokemon->name}}" style="object-fit: contain; aspect-ratio: 1/1" height="350px">
                <div class="card-body">
                    <a href="{{ route('pokemons.show', [
                                        'pokemon' => $pokemon,
                                        'backRoute' => 'teams.show',
                                        'team_id' => $team->id
                                        ])
                                    }}">
                        <h5 class="card-title">{{ $pokemon->name }}</h5>
                    </a>
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
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
