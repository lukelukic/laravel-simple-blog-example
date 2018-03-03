@extends("layouts.admin")
@section("content")
    @empty($form)
        @include("admin.components.gallery.table")
    @endempty

    @isset($form)
        @switch($form)
            @case('edit')
                @include('admin.components.gallery.edit_form')
            @break
            @case('insert')
                @include('admin.components.gallery.insert_form')
            @break
        @endswitch
    @endisset
@endsection
