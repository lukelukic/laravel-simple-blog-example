<table id="" class="table table-striped">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td><a href="{{ route("users.show", ['id' => $user->id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
            <td><a href="{{ route("users.delete", ['id' => $user->id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>