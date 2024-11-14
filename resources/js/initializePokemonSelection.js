export function initializePokemonSelection(slotSelector, pokemonCardSelector, modalSelector, hiddenInputSelector) {
    const selectedPokemons = {};
    let currentSlotId = null;

    document.querySelectorAll(slotSelector).forEach(slot => {
        slot.addEventListener('click', function () {
            currentSlotId = this.dataset.slotId;

            document.querySelectorAll(pokemonCardSelector).forEach(card => {
                card.classList.remove('selected-green', 'selected-blue');

                if (Object.values(selectedPokemons).includes(card.dataset.pokemonId)) {
                    card.classList.add('selected-blue');
                }

                if (selectedPokemons[currentSlotId] === card.dataset.pokemonId) {
                    card.classList.remove('selected-blue');
                    card.classList.add('selected-green');
                }
            });

            $(modalSelector).modal('show');
        });
    });

    document.querySelectorAll(pokemonCardSelector).forEach(card => {
        card.addEventListener('click', function () {
            const pokemonId = this.dataset.pokemonId;
            const pokemonName = this.dataset.pokemonName;

            if (selectedPokemons[currentSlotId] === pokemonId) {
                delete selectedPokemons[currentSlotId];
                document.getElementById(`slot-${currentSlotId}`).textContent = "Empty";
                document.querySelector(hiddenInputSelector).value = Object.values(selectedPokemons).join(',');

                this.classList.remove('selected-green');
            } else if (!Object.values(selectedPokemons).includes(pokemonId)) {
                document.getElementById(`slot-${currentSlotId}`).textContent = pokemonName;
                selectedPokemons[currentSlotId] = pokemonId;
                document.querySelector(hiddenInputSelector).value = Object.values(selectedPokemons).join(',');

                document.querySelectorAll(pokemonCardSelector).forEach(card => {
                    card.classList.remove('selected-green', 'selected-blue');
                    if (Object.values(selectedPokemons).includes(card.dataset.pokemonId)) {
                        card.classList.add('selected-blue');
                    }
                    if (selectedPokemons[currentSlotId] === card.dataset.pokemonId) {
                        card.classList.add('selected-green');
                    }
                });
            } else {
                alert("This Pokemon is already selected in another slot.");
            }

            $(modalSelector).modal('hide');
        });
    });
}
