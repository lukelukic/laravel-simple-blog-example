<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Route URL</th>
        <th>Position</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
        @foreach($navigations as $nav)
            <tr>
                <td>{{ $nav->name }}</td>
                <td>{{ $nav->route }}</td>
                <td><input class="form-control" type="number" value="{{ $nav->position }}"></td>
                <td><a href="{{ route("navigation.show", ['id' => $nav->id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                <td><a href="{{ route("navigation.delete", ['id' => $nav->id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>