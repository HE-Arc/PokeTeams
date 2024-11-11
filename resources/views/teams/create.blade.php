@extends("layout.app")

@section("content")
<div class="container mt-5 w-75">
    <h1>Create New Team</h1>

    <a href="{{ route('teams.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i> Back to Teams</a>

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="teamName">Team Name</label>
            <input type="text" name="name" id="teamName" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group mt-4">
            <h3>Select Pokemon</h3>
            <div class="row">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-4 mb-3">
                        <div class="slot border p-2 text-center" data-slot-id="{{ $i }}" style="cursor: pointer;">
                            <span id="slot-{{ $i }}">Empty</span>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="row">
                @for ($i = 4; $i <= 6; $i++)
                    <div class="col-4 mb-3">
                        <div class="slot border p-2 text-center" data-slot-id="{{ $i }}" style="cursor: pointer;">
                            <span id="slot-{{ $i }}">Empty</span>
                        </div>
                    </div>
                @endfor
            </div>
        </div>


        <input type="hidden" name="selected_pokemons" id="selectedPokemons">

        <button type="submit" class="btn btn-success mt-2">Create Team</button>

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
</div>

<div class="modal fade" id="pokemonModal" tabindex="-1" role="dialog" aria-labelledby="pokemonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pokemonModalLabel">Select a Pokemon</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($pokemons as $pokemon)
                        <div class="col-3 mb-3">
                            <div class="pokemon-card border p-2 text-center" data-pokemon-id="{{ $pokemon->id }}" data-pokemon-name="{{ $pokemon->name }}" style="cursor: pointer;">
                                {{ $pokemon->name }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .pokemon-card {
        cursor: pointer;
    }
    .pokemon-card.selected-blue {
        background-color: #007bff;
        color: white;
    }
    .pokemon-card.selected-green {
        background-color: #28a745;
        color: white;
    }
    .slot {
        height: 100px;
        background-color: #f0f0f0;
        line-height: 70px;
        font-size: 1.2em;
    }
</style>
@endsection
