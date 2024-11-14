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
                            <div class="pokemon-card border p-2 text-center"
                                 data-pokemon-id="{{ $pokemon->id }}"
                                 data-pokemon-name="{{ $pokemon->name }}"
                                 style="cursor: pointer;">
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
</style>
