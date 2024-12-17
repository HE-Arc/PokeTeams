export function initializePokemonSelection(hiddenInputSelector) {
    const selectedPokemons = {};

    function getUrlParams() {
        return new URLSearchParams(window.location.search);
    }

    function loadSelectedPokemonsFromUrl() {
        const params = getUrlParams();
        const pairs = params.toString().split("&");

        Object.keys(selectedPokemons).forEach(key => delete selectedPokemons[key]);

        pairs.forEach(pair => {
            if (pair.includes("=")) {
                const [key, value] = pair.split("=");
                if (key.startsWith("pokemon_") && value !== "undefined" && value !== "") {
                    const index = parseInt(key.split("_")[1], 10);
                    if (index >= 1 && index <= 6 && !selectedPokemons[index]) {
                        selectedPokemons[index] = String(value);
                    }
                }
            }
        });
        updateHiddenInput();
    }

    function updateHiddenInput() {
        const hiddenInput = document.querySelector(hiddenInputSelector);
        hiddenInput.value = Object.values(selectedPokemons).join(',');
    }

    loadSelectedPokemonsFromUrl();
}
