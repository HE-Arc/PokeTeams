@extends("layout.app")

@section("content")

<div class="container mt-5 w-75">
    <h1>Create a New Account for PokeTeams</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('register') }}" method="post" class="vstack gap-3">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops! There were some problems with your input.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button class="btn btn-primary mt-2">Register</button>
            </form>
        </div>
    </div>
</div>

@endsection
