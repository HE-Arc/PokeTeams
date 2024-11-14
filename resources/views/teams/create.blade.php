@extends("layout.app")

@section("content")
<div class="container mt-5 w-75">
    <h1>Create New Team</h1>

    <a href="{{ route('teams.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i> Back to Teams</a>

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="teamName">Team Name</label>
            <input type="text" name="name" id="teamName" class="form-control">
        </div>

        @include("partials.team-form")
        @include("partials.errors-form")


        <button type="submit" class="btn btn-success mt-2">Create Team</button>
    </form>
</div>

@include("partials.pokemon-modal")
@endsection
