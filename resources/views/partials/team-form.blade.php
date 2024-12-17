<div class="form-group mt-4">
    <h3>Select Pokemon</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 mb-3">
    @for ($i = 1; $i <= 6; $i++)
        @php
            $pokemonId = request()->query('pokemon_' . $i);
            $pokemon = $pokemonId ? \App\Models\Pokemon::getPokemonById($pokemonId) : null;
        @endphp
        @if($pokemon)
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
                        <a href="{{ route('pokemons.show', [$pokemon, 'noBack']) }}" target="_blank" class="btn btn-info btn-actions">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        @php
                                $queryParams = $_GET;
                                if (!empty($team)) {
                                    $queryParams['team'] = $team->id;
                                }
                                unset($queryParams['pokemon_'.$i]);
                        @endphp
                        @if(!empty($team))
                            <a href="{{ route('teams.edit', $queryParams) }}" class="btn btn-danger btn-actions">
                        @else
                            <a href="{{ route('teams.create', $queryParams) }}" class="btn btn-danger btn-actions">
                        @endif
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="col">
                <div class="card h-100 d-flex flex-column justify-content-center py-3">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <h4 class="card-title">Empty</h4>
                        Add a Pokemon
                    </div>
                    <div class="d-flex justify-content-center">
                        @php
                            $queryParams = $_GET;
                            if (!empty($team)) {
                                $queryParams['team'] = $team->id;
                            } else {
                                $queryParams['new_team'] = 0;
                            }
                        @endphp
                        <a href="{{ route('pokemons.index', $queryParams) }}" class="btn btn-success btn-actions">
                            <i class="bi bi-plus-square-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endfor
    </div>
    <input name="selected_pokemons" id="selectedPokemons" type="hidden">
</div>
