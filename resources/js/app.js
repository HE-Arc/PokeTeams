import './bootstrap';

import { initializePokemonSelection } from './initializePokemonSelection.js';

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname === '/teams/create') {
        initializePokemonSelection('.slot', '.pokemon-card', '#pokemonModal', '#selectedPokemons');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    initializePokemonSelection('.slot', '.pokemon-card', '#pokemonModal', '#selectedPokemons');
});
