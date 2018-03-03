@extends("layouts.admin")
@section("styles")
    <link rel="stylesheet" href="{{ asset("summernote/summernote.css") }}">
@endsection
@section("content")
    @empty($form)
        @foreach($posts as $post)
            @component("admin.components.posts.post_tab",[
                'post' => $post
            ])@endcomponent
        @endforeach
    @endempty

    @isset($form)
        @switch($form)
            @case('edit')
                @include('admin.components.posts.edit_form')
            @break
            @case('insert')
                @include('admin.components.posts.insert_form')
            @break
        @endswitch
    @endisset
@endsection

@section('scripts')
    <script src="{{ asset("summernote/summernote.js") }}"></script>
    <script>
        $("#content").summernote();
    </script>
@endsection

