<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Picture</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($galleries as $g)
        <tr>
            <td>{{ $g->title }}</td>
            <td>{{ $g->description }}</td>
            <td><img height="100" src="{{ asset($g->file) }}" alt="{{ asset($g->alt) }}"></td>
            <td><a href="{{ route("gallery.show", ['id' => $g->id]) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
            <td><a href="{{ route("gallery.delete", ['id' => $g->id]) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">delete</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>