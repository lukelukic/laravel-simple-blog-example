@extends("layouts.front")

@section("title") Coffee - Single Post @endsection

@section('content')
    <div class="single">
        <div class="container">
            <div class="single-top">
                <a href="{{ route("single", ['id' => $post->id]) }}"><img class="img-responsive" src="{{ asset($post->file) }}" alt="{{ $post->alt }}"></a>
                <div class=" single-grid">
                    <h4>{{ strtoupper($post->title) }}</h4>
                    {!! $post->content !!}
                    @include("front.components.post.post_info")
                </div>

                @component("front.components.post.comments", [
                    'comments' => $post->comments
                ])@endcomponent
                @if(session()->get('user'))
                    @include('front.components.post.comment_form')
                @else
                    <h4>In order to comment, you must <a href="{{ route('loginForm') }}">login</a> first.</h4>
                @endif
                <br><br><br>
        </div>
    </div>
@endsection

@section('appendScripts')
    <script src="{{ asset("js/ajax.js") }}"></script>
@endsection