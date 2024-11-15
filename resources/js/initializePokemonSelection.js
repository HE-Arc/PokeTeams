export function initializePokemonSelection(slotSelector, addPokemonBtnSelector, modalSelector, hiddenInputSelector) {
    const selectedPokemons = {};
    let currentSlotId = null;

    function updateSlotDisplay(slotId, pokemonName, pokemonSprite) {
        const slotElement = document.getElementById(`slot-${slotId}`);
        if (pokemonName) {
            slotElement.innerHTML = `
            <div class="card text-center">
                <img class="card-img-top" src="${pokemonSprite}" alt="Sprite of ${pokemonName}" style="object-fit: contain; aspect-ratio: 1/1" height="200px">
                <div class="card-body p-2">
                    <h5 class="card-title mb-0">${pokemonName}</h5>
                </div>
            </div>
        `;
        } else {
            slotElement.innerHTML = "";
        }
    }

    function updateHiddenInput() {
        const hiddenInput = document.querySelector(hiddenInputSelector);
        hiddenInput.value = Object.values(selectedPokemons).join(',');
    }


    function updateCardVisuals() {
        document.querySelectorAll('.pokemon-card').forEach(card => {
            card.classList.remove('selected-green', 'selected-yellow');
            const pokemonId = card.querySelector('.add-pokemon-btn').dataset.pokemonId;
            const addButton = card.querySelector('.add-pokemon-btn');

            if (selectedPokemons[currentSlotId] === pokemonId) {
                updateCardIfSelected(card, addButton);
            } else if (Object.values(selectedPokemons).includes(pokemonId)) {
                updateCardIfSelectedOnAnotherSlot(card, addButton);
            } else {
                updateCardIfNotSelected(card, addButton);
            }
        });
    }

    function updateCardIfSelected(card, addButton) {
        card.classList.add('selected-green');
        addButton.classList.remove('btn-success');
        addButton.classList.add('btn-danger');
        addButton.innerHTML = '<i class="bi bi-dash"></i>';
    }

    function updateCardIfSelectedOnAnotherSlot(card, addButton) {
        card.classList.add('selected-yellow');
        addButton.classList.remove('btn-danger');
        addButton.classList.add('btn-success');
        addButton.innerHTML = '<i class="bi bi-plus"></i>';
    }

    function updateCardIfNotSelected(card, addButton) {
        addButton.classList.remove('btn-danger');
        addButton.classList.add('btn-success');
        addButton.innerHTML = '<i class="bi bi-plus"></i>';
    }

    function handleSlotClick(event) {
        currentSlotId = event.currentTarget.dataset.slotId;
        updateCardVisuals();
        $(modalSelector).modal('show');
    }

    function handleAddButtonClick(event) {
        const button = event.currentTarget;
        const pokemonId = button.dataset.pokemonId;
        const pokemonName = button.dataset.pokemonName;
        const pokemonSprite = button.dataset.pokemonSprite;

        if (selectedPokemons[currentSlotId] === pokemonId) {
            delete selectedPokemons[currentSlotId];
            updateSlotDisplay(currentSlotId);
        } else if (!Object.values(selectedPokemons).includes(pokemonId)) {
            selectedPokemons[currentSlotId] = pokemonId;
            updateSlotDisplay(currentSlotId, pokemonName, pokemonSprite);
        } else {
            alert("This Pokemon is already selected in another slot.");
            return;
        }

        updateHiddenInput();
        updateCardVisuals();
    }


    document.querySelectorAll(slotSelector).forEach(slot => {
        slot.addEventListener('click', handleSlotClick);
    });

    document.querySelectorAll(addPokemonBtnSelector).forEach(button => {
        button.addEventListener('click', handleAddButtonClick);
    });
}
