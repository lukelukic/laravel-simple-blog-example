<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <form action="{{ route("login") }}" method="post">
            {{ csrf_field() }}
            <h1 class="lead">Login here:</h1>

            <div class="form-group">

                <input type="text" class="form-control" name="username"  placeholder="Username">

            </div>

            <div class="form-group">

                <input type="password" class="form-control" name="password"  placeholder="Password">

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-warning" name="button">Login</button>

            </div>

        </form>

        <div class="form-group">

            <p>Do not have an account? Register <a href="{{ route("registerForm") }}">here</a>. </p>

        </div>

    </div>

</div>