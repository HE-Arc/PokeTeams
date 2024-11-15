@extends("layout.app")

@section("content")
    <style>
        .type-wrapper {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
    </style>
    <div class="container mt-5">
        <h1>Pokemon List</h1>

        <form action="{{ route('pokemons.index') }}" method="get" class="d-flex align-items-center gap-3 mt-3 mb-3" style="flex-wrap: nowrap;">
            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
            </div>

            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="type1">Type&nbsp;1</label>
                <select class="form-select" id="type1" name="type1">
                    <option value="">Any</option>
                    @foreach($types as $type)
                        <option <?php if (isset($_GET['type1']) and $type->id == $_GET['type1']) echo "selected" ?> value="{{$type->id}}" style="background-color: {{ $type->color }};">
                            {{ strtoupper($type->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="type2">Type&nbsp;2</label>
                <select class="form-select" id="type2" name="type2">
                    <option value="">Any</option>
                    <option <?php if (isset($_GET['type2']) and "None" == $_GET['type2']) echo "selected" ?> value="None">None</option>
                    @foreach($types as $type)
                        <option <?php if (isset($_GET['type2']) and $type->id == $_GET['type2']) echo "selected" ?> value="{{$type->id}}" style="background-color: {{ $type->color }};">
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
            <br><p>No pokemon matches with the selected filters.</p>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sprite</th>
                    <th>Name</th>
                    <th>Types</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pokemons as $pokemon)
                    <tr>
                        <td style="width:80px">
                            <img height="80px" style="aspect-ratio: 1/1; object-fit: contain" src="/images/pokemon_sprites/{{$pokemon->sprite}}" alt="Sprite of {{$pokemon->name}}">
                        </td>
                        <td>
                            <a href="{{ route('pokemons.show', array_filter([
                                                            'pokemon' => $pokemon,
                                                            'backRoute' => 'pokemons.index',
                                                            'params' => $_GET
                                                            ])
                                                        )}}">
                                {{ $pokemon->name }}
                            </a>



                        </td>
                        <td style="width:70px">
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
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <div class="d-flex justify-content-center">
            {{ $pokemons->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
