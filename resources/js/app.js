import './bootstrap';

import { initializePokemonSelection } from './initializePokemonSelection.js';

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname === '/teams/create') {
        initializePokemonSelection('.slot', '.add-pokemon-btn', '#pokemonModal', '#selectedPokemons');

    }
});

document.addEventListener('DOMContentLoaded', () => {
    initializePokemonSelection('.slot', '.add-pokemon-btn', '#pokemonModal', '#selectedPokemons');
});
