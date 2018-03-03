<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <form action="{{ route("register") }}" method="post">
            {{ csrf_field() }}
            <h1 class="lead">Register here:</h1>

            <div class="form-group">

                <input type="text" class="form-control" name="first_name"  placeholder="First Name">

            </div>

            <div class="form-group">

                <input type="text" class="form-control" name="last_name"  placeholder="Last Name">

            </div>

            <div class="form-group">

                <input type="text" class="form-control" name="email"  placeholder="Email">

            </div>

            <div class="form-group">

                <input type="text" class="form-control" name="username"  placeholder="Username">

            </div>

            <div class="form-group">

                <input type="password" class="form-control" name="password"  placeholder="Password">

            </div>

            <div class="form-group">

                <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm password">

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-warning">Register</button>

            </div>

        </form>

        <div class="form-group">

            <p>Already have an account? Login <a href="{{ route("loginForm") }}">here</a>. </p>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get("success") }}
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get("error") }}
            </div>
        @endif

    </div>

</div>

