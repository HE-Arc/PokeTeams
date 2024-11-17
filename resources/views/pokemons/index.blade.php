@extends("layout.app")

@section("content")
    <div class="container mt-5">
        <h1>Pokemon List</h1>

        <form action="{{ route('pokemons.index') }}" method="get" class="d-flex align-items-center gap-3 mt-3 mb-3" style="flex-wrap: nowrap;">
            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ request('name') }}">
            </div>

            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="type1">Type&nbsp;1</label>
                <select class="form-select" id="type1" name="type1">
                    <option value="">Any</option>
                    @foreach($types as $type)
                        <option class="type-option" value="{{$type->id}}" style="background-color: {{ $type->color }};"
                            {{ request('type1') == $type->id ? 'selected' : '' }}>
                            {{ strtoupper($type->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="type2">Type&nbsp;2</label>
                <select class="form-select" id="type2" name="type2">
                    <option value="">Any</option>
                    <option value="None" {{ request('type2') == 'None' ? 'selected' : '' }}>None</option>
                    @foreach($types as $type)
                        <option class="type-option" value="{{$type->id}}" style="background-color: {{ $type->color }};"
                            {{ request('type2') == $type->id ? 'selected' : '' }}>
                            {{ strtoupper($type->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button class="btn btn-primary">Apply</button>
            </div>
        </form>

        @if($pokemons->isEmpty())
            <p class="mt-4">No Pokémon matches the selected filters.</p>
        @else
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($pokemons as $pokemon)
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
                                <a href="{{ route('teams.add-pokemon', $pokemon) }}" class="btn btn-success btn-actions">
                                    <i class="bi bi-plus-square-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="d-flex justify-content-center mt-4">
            {{ $pokemons->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
