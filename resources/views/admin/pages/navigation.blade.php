@extends("layouts.admin")
@section("content")
    @empty($form)
        @include("admin.components.navigation.table")
    @endempty

    @isset($form)
        @switch($form)
            @case('edit')
                @include('admin.components.navigation.edit_form')
            @break
            @case('insert')
                @include('admin.components.navigation.insert_form')
            @break
        @endswitch
    @endisset
@endsection
