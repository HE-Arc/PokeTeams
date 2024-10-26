@extends("layout.app")

@section("content")
    <div class="container mt-5">
        <h1>Create New Team</h1>

        <a href="{{ route('teams.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i> Back to Teams</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops! There were some problems with your input.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="teamName">Team Name</label>
                <input type="text" name="name" id="teamName" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group mt-4">
                <h3>Select Pokemon</h3>
                <div class="row">
                    @foreach($pokemons as $pokemon)
                        <div class="col-3 mb-3">
                            <div
                                class="pokemon-card border p-2 text-center"
                                data-pokemon-id="{{ $pokemon->id }}"
                                style="cursor: pointer;">
                                {{ $pokemon->name }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <input type="hidden" name="selected_pokemons" id="selectedPokemons">
            <button type="submit" class="btn btn-success">Create Team</button>
        </form>
    </div>

    <style>
        .pokemon-card.locked {
            background-color: #007bff;
            color: white;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectedPokemons = new Set();

            document.querySelectorAll('.pokemon-card').forEach(card => {
                card.addEventListener('click', function () {
                    const pokemonId = this.dataset.pokemonId;

                    if (selectedPokemons.has(pokemonId)) {
                        selectedPokemons.delete(pokemonId);
                        this.classList.remove('locked');
                    } else {
                        selectedPokemons.add(pokemonId);
                        this.classList.add('locked');
                    }

                    document.getElementById('selectedPokemons').value = Array.from(selectedPokemons).join(',');
                });
            });
        });
    </script>
@endsection
