@extends("layout.app")

@section("content")
<div class="container mt-5">
    <h1>PokeTeams</h1>
    <div class="container my-5">
        <p>
            This site was designed during the Web Development 1 course, it allows you to create, manage, and optimize Pokémon teams:
        </p>
        <ul>
            <li>Create and customize your teams with your favorite Pokémon</li>
            <li>View their overall strengths and weaknesses based on team types</li>
            <li>Explore the stats and strengths of each Pokémon</li>
            <li>Quickly search for Pokémon and discover their sprites, types, and characteristics.</li>
        </ul>
        <p class="text-center mt-4">
            <strong>Ready to get started? <a href="/teams" class="btn btn-primary">Create your first team now!</a></strong>
        </p>
    </div>
</div>
@endsection
