import './bootstrap';

import { initializePokemonSelection } from './initializePokemonSelection.js';

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname === '/teams/create') {
        initializePokemonSelection('#selectedPokemons');

    }
});

document.addEventListener('DOMContentLoaded', () => {
    initializePokemonSelection( '#selectedPokemons');
});
