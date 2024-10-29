@extends("layout.app")

@section("content")
<style>
    .type-wrapper {
        display: flex;
        gap: 5px;
    }

</style>
<div class="container mt-5">
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
                <td>{{ $pokemon->name }}</td>
                <td class="w-20">
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
</div>
@endsection
