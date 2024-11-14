<div class="form-group mt-4">
    <h3>Select Pokemon</h3>
    <div class="row">
        @for ($i = 1; $i <= 3; $i++)
            <div class="col-4 mb-3">
                <div class="slot border p-2 text-center" data-slot-id="{{ $i }}">
                    <span id="slot-{{ $i }}"></span>
                </div>
            </div>
        @endfor
    </div>
    <div class="row">
        @for ($i = 4; $i <= 6; $i++)
            <div class="col-4 mb-3">
                <div class="slot border p-2 text-center" data-slot-id="{{ $i }}">
                    <span id="slot-{{ $i }}"></span>
                </div>
            </div>
        @endfor
    </div>
</div>

<input type="hidden" name="selected_pokemons" id="selectedPokemons">

<style>
    .slot {
        height: 260px;
        cursor: pointer;
        background-color: #f0f0f0;
        line-height: 70px;
        font-size: 1.2em;
    }

    .slot:hover {
        background-color: #d4f3e8;
    }
</style>
