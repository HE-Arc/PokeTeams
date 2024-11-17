@extends("layout.app")

@section("content")
    <div class="container mt-5 w-75">
        @if(!isset($_GET['noBack']))
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">
                <i class="bi bi-arrow-return-left"></i> Back
            </a>
        @endif

        <div class="card p-4 pt-4">
            <div class="text-center mb-3">
                <h1 class="mb-4">{{ $pokemon->name }}</h1>
                <img src="/images/pokemon_sprites/{{ $pokemon->sprite }}"
                     alt="Sprite of {{ $pokemon->name }}"
                     class="mx-auto"
                     style="aspect-ratio: 1/1; object-fit: contain; height: 250px;">
            </div>
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

            <div class="pt-4">
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>Statistic</th>
                        <th>Base</th>
                        <th>Min</th>
                        <th>Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>HP</td>
                        <td>{{ $pokemon->base_hp }}</td>
                        <td>{{ $pokemon->min_hp }}</td>
                        <td>{{ $pokemon->max_hp }}</td>
                    </tr>
                    <tr>
                        <td>Attack</td>
                        <td>{{ $pokemon->base_attack }}</td>
                        <td>{{ $pokemon->min_attack }}</td>
                        <td>{{ $pokemon->max_attack }}</td>
                    </tr>
                    <tr>
                        <td>Defense</td>
                        <td>{{ $pokemon->base_defense }}</td>
                        <td>{{ $pokemon->min_defense }}</td>
                        <td>{{ $pokemon->max_defense }}</td>
                    </tr>
                    <tr>
                        <td>Special Attack</td>
                        <td>{{ $pokemon->base_special_attack }}</td>
                        <td>{{ $pokemon->min_special_attack }}</td>
                        <td>{{ $pokemon->max_special_attack }}</td>
                    </tr>
                    <tr>
                        <td>Special Defense</td>
                        <td>{{ $pokemon->base_special_defense }}</td>
                        <td>{{ $pokemon->min_special_defense }}</td>
                        <td>{{ $pokemon->max_special_defense }}</td>
                    </tr>
                    <tr>
                        <td>Speed</td>
                        <td>{{ $pokemon->base_speed }}</td>
                        <td>{{ $pokemon->min_speed }}</td>
                        <td>{{ $pokemon->max_speed }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
