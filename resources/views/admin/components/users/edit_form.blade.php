<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Add new user</p>

        <form action="{{ route("users.update", ['id' => $user->id]) }}" method="post">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="first_name" type="text" value="{{ $user->first_name }}" class="form-control" placeholder="First Name">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="last_name" type="text" value="{{ $user->last_name }}" class="form-control" placeholder="Last Name">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="email" type="text" value="{{ $user->email }}" class="form-control" placeholder="Email">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="username" type="text" value="{{ $user->username }}" class="form-control" placeholder="Username">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <input name="password" type="password" class="form-control" placeholder="Password">

                </div>

            </div>

            <div class="form-group">

                <p><i>Roles:</i></p>
                @foreach($roles as $role)
                    <input id="role{{$role->id}}" name="role_id" class="chk-col-deep-purple" value="{{ $role->id }}" {{ $role->id == $user->role_id ? "checked" : "" }} type="radio">
                    <label for="role{{$role->id}}"> {{ $role->name }} </label>
                @endforeach

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Edit">

                <a href="{{ route("users.index") }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>