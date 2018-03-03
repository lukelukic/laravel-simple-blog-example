<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td><a href="{{ route("roles.delete", ['id' => $role->id]) }}" class="btn btn-danger waves-effect btn-xs pull-right"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>