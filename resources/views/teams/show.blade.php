@extends("layout.app")

@section("content")
    <div class="container mt-5">
        <h1>{{ $team->name }}</h1>

        <p><strong>Creator :</strong> {{ $team->user->name }}</p>

        <a href="{{ route('teams.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i> Back
            to Teams</a>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach($team->pokemons as $pokemon)
                <div class="col">
                    <div class="card h-100 py-3">
                        <img src="/images/pokemon_sprites/{{ $pokemon->sprite }}" class="card-img-top"
                             alt="Sprite of {{ $pokemon->name }}" style="aspect-ratio: 1/1; height: 175px; object-fit: contain;">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ $pokemon->name }}</h4>
                            <hr>
                            <div class="type-wrapper">
                                    <span class="card-type" style="background-color: {{ $pokemon->type1->color }};">
                                        {{ strtoupper($pokemon->type1->name) }}
                                    </span>
                                @if ($pokemon->type2)
                                    <span class="card-type" style="background-color: {{ $pokemon->type2->color }};">
                                            {{ strtoupper($pokemon->type2->name) }}
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('pokemons.show', $pokemon) }}" class="btn btn-info btn-actions">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
