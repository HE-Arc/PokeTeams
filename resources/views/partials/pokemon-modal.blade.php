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
                            <div class="pokemon-card border p-2 text-center">
                                <h6>{{ $pokemon->name }}</h6>
                                <button class="btn add-pokemon-btn"
                                        data-pokemon-id="{{ $pokemon->id }}"
                                        data-pokemon-name="{{ $pokemon->name }}"
                                        data-pokemon-sprite="/images/pokemon_sprites/{{$pokemon->sprite}}"
                                        data-bs-dismiss="modal">
                                    <i class="bi bi-plus"></i>
                                </button>
                                <a href="{{ route('pokemons.show', $pokemon) }}" target="_blank" class="btn btn-secondary">
                                    <i class="bi bi-eye"></i>
                                </a>
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
        cursor: default;
    }
    .pokemon-card.selected-blue {
        background-color: #007bff;
        color: white;
    }
    .pokemon-card.selected-green {
        background-color: #28a745;
        color: white;
    }
    .btn-remove {
        background-color: #dc3545;
        color: white;
    }
</style>
