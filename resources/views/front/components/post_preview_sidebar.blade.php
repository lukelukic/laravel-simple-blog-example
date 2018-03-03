<div class="might-grid">
    <div class="grid-might">
        <a href="{{ route("single", ['id' => $post->id]) }}"><img src="{{ asset($post->file) }}" class="img-responsive" alt="{{ asset($post->alt) }}"> </a>
    </div>
    <div class="might-top">
        <h4><a href="{{ route("single", ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
        <p>{!!   substr($post->description, 0, 100) . "..." !!}</p>
    </div>
    <div class="clearfix"></div>
</div>