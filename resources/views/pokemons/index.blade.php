@extends("layout.app")

@section("content")
    <div class="container mt-5">
        @if($team != null)
            <h1>Select a Pokemon for {{ $team->name }}</h1>
        @else
            <h1>Pokemon List</h1>
        @endif

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

            @foreach(range(1, 6) as $i)
                @if(isset($_GET['pokemon_'.$i]))
                    <input name = "{{'pokemon_'.$i}}" value="{{ $_GET['pokemon_'.$i]}}" type="hidden">
                @endif
            @endforeach

            @if($team != null)
                <input name="team" value="{{ $team->id }}" type="hidden">
            @elseif(isset($_GET['new_team']))
                <input name="new_team" value="0" type="hidden">
            @endif


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
                                @if($team != null or isset($_GET['new_team']))
                                    @php
                                        if($team != null){
                                            $queryParams = ['team' => $team->id];
                                        }
                                        $index = 0;
                                        for ($i = 1; $i <= 6; $i++) {
                                            if(isset($_GET['pokemon_'.$i])) {
                                                $queryParams['pokemon_'.$i] = $_GET['pokemon_'.$i];
                                            } else if ($index == 0) {
                                                $index = $i;
                                            }
                                        }
                                        $queryParams["pokemon_".$index] = $pokemon->id;
                                    @endphp
                                    @if(!isset($_GET['new_team']))
                                        <a href="{{ route('teams.edit', $queryParams) }}" class="btn btn-success btn-actions">
                                            @else
                                            <a href="{{ route('teams.create', $queryParams) }}" class="btn btn-success btn-actions">
                                    @endif
                                        <i class="bi bi-plus-square-fill"></i>
                                    </a>
                                @endif
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
