@extends("layout.app")

@section("content")
<style>
    .type-tag {
        display: inline-block;
        width: 60px;
        height: 35px;
        line-height: 35px;
        border-radius: 50%;
        color: white;
        font-weight: bold;
        text-align: center;
        margin-right: 5px;
        font-size: 12px;
        flex-shrink: 0;
    }

    .type-wrapper {
        display: flex;
        gap: 5px;
    }

    .fixed-width {
        width: 20%;
    }
</style>
<body>
<div class="container mt-5">
    <h1>Pokemon List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th class="fixed-width">Types</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pokemons as $pokemon)
            <tr>
                <td>{{ $pokemon->name }}</td>
                <td class="fixed-width">
                    <div class="type-wrapper">
                        <span class="type-tag" style="background-color: {{ $pokemon->type1->color }};">
                            {{ $pokemon->type1->name }}
                        </span>
                        @if ($pokemon->type2)
                            <span class="type-tag" style="background-color: {{ $pokemon->type2->color }};">
                                {{ $pokemon->type2->name }}
                            </span>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
@endsection
