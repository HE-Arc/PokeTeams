export function initializePokemonSelection(slotSelector, pokemonCardSelector, modalSelector, hiddenInputSelector) {
    const selectedPokemons = {};
    let currentSlotId = null;

    function updateSlotDisplay(slotId, pokemonName) {
        document.getElementById(`slot-${slotId}`).textContent = pokemonName || "Empty";
    }

    function updateHiddenInput() {
        document.querySelector(hiddenInputSelector).value = Object.values(selectedPokemons).join(',');
    }

    function updateCardVisuals() {
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
    }

    function handleSlotClick(event) {
        currentSlotId = event.currentTarget.dataset.slotId;
        updateCardVisuals();
        $(modalSelector).modal('show');
    }

    function handleCardClick(event) {
        const card = event.currentTarget;
        const pokemonId = card.dataset.pokemonId;
        const pokemonName = card.dataset.pokemonName;

        if (selectedPokemons[currentSlotId] === pokemonId) {
            delete selectedPokemons[currentSlotId];
            updateSlotDisplay(currentSlotId);
        } else if (!Object.values(selectedPokemons).includes(pokemonId)) {
            selectedPokemons[currentSlotId] = pokemonId;
            updateSlotDisplay(currentSlotId, pokemonName);
        } else {
            alert("This Pokemon is already selected in another slot.");
            return;
        }

        updateHiddenInput();
        updateCardVisuals();
        $(modalSelector).modal('hide');
    }

    document.querySelectorAll(slotSelector).forEach(slot => {
        slot.addEventListener('click', handleSlotClick);
    });

    document.querySelectorAll(pokemonCardSelector).forEach(card => {
        card.addEventListener('click', handleCardClick);
    });
}
