<div class="form-group">
    <label for="teamName">Team Name</label>
    <input type="text" name="name" id="teamName" class="form-control" value="{{ old('name', $team->name ?? '') }}">
</div>
<div class="form-group mt-4">
    <h3>Select Pokemon (6 slots)</h3>
    <div class="row">
        <!-- Première ligne de 3 slots -->
        @for ($i = 1; $i <= 3; $i++)
            <div class="col-4 mb-3">
                <div class="slot border p-2 text-center" data-slot-id="{{ $i }}" style="cursor: pointer;">
                    <span id="slot-{{ $i }}">Empty</span>
                </div>
            </div>
        @endfor
    </div>
    <div class="row">
        <!-- Deuxième ligne de 3 slots -->
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

<style>
    .slot {
        height: 100px;
        background-color: #f0f0f0;
        line-height: 70px;
        font-size: 1.2em;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectedPokemons = {};
        let currentSlotId = null;

        document.querySelectorAll('.slot').forEach(slot => {
            slot.addEventListener('click', function () {
                currentSlotId = this.dataset.slotId;

                document.querySelectorAll('.pokemon-card').forEach(card => {
                    card.classList.remove('selected-green', 'selected-blue');

                    if (Object.values(selectedPokemons).includes(card.dataset.pokemonId)) {
                        card.classList.add('selected-blue');
                    }

                    if (selectedPokemons[currentSlotId] === card.dataset.pokemonId) {
                        card.classList.remove('selected-blue');
                        card.classList.add('selected-green');
                    }
                });

                $('#pokemonModal').modal('show');
            });
        });
    });
</script>
