@extends("layout.app")

@section("content")
    <style>
        .type-wrapper {
            display: flex;
            gap: 5px;
        }
    </style>
    <div class="container mt-5">
        <h1>Filters</h1>

        <form action="{{ route('pokemons.index') }}" method="get" class="d-flex align-items-center gap-3" style="flex-wrap: nowrap;">
            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="namefilter">Name</label>
                <input <?php if (isset($_GET['type1filter'])) echo "value" ?> type="text" class="form-control" id="namefilter" name="namefilter">
            </div>

            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="type1filter">Type&nbsp;1</label>
                <select class="form-select" id="type1filter" name="type1filter">
                    <option value="">Any</option>
                    @foreach($types as $type)
                        <option <?php if (isset($_GET['type1filter']) and $type->id == $_GET['type1filter']) echo "selected" ?> value="{{$type->id}}" style="background-color: {{ $type->color }};">
                            {{ strtoupper($type->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group d-flex align-items-center me-2">
                <label class="form-label me-2 whitespace-nowrap" for="type2filter">Type&nbsp;2</label>
                <select class="form-select" id="type2filter" name="type2filter">
                    <option value="">Any</option>
                    <option value="None">None</option>
                    @foreach($types as $type)
                        <option <?php if (isset($_GET['type2filter']) and $type->id == $_GET['type2filter']) echo "selected" ?> value="{{$type->id}}" style="background-color: {{ $type->color }};">
                            {{ strtoupper($type->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button class="btn btn-primary">Apply</button>
            </div>
        </form>

        <h1>Pokemon List</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Types</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td>
                        <a href="{{ route('pokemons.show', $pokemon) }}">{{ $pokemon->name }}</a>
                    </td>
                    <td class="w-25">
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
        <div class="d-flex justify-content-center">
            {{ $pokemons->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
