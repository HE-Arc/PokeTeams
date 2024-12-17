@extends("layout.app")

@section("content")
<div class="container mt-5">
    <h1>PokeTeams</h1>
    <div class="container my-5">
        <p>
            Ce site a été conçu lors du cours Developpement Web 1, il permet de créer, gérer et optimiser des équipes de Pokémons :
        </p>
        <ul>
            <li>Créer et personnaliser vos équipes avec vos Pokémon préférés</li>
            <li>Visualiser leurs forces et faiblesses globales en fonction des types de l'équipe</li>
            <li>Explorer les statistiques et les forces de chaque Pokémon</li>
            <li>Rechercher des Pokémon rapidement et découvrir leurs sprites, types, et caractéristiques.</li>
        </ul>
        <p class="text-center mt-4">
            <strong>Prêt à commencer ? <a href="/teams" class="btn btn-primary">Créez votre première équipe dès maintenant !</a></strong>
        </p>
    </div>

</div>
@endsection
