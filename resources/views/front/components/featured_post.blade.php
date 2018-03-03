<div class="about-one">
    <p>Latest post</p>
    <h3>{{ $post->title }}</h3>
</div>
<div class="about-two">
    <a href="{{ route("single", ['id' => $post->id]) }}"><img src="{{ asset($post->file) }}" class="img-responsive" alt="{{ asset($post->alt) }}"></a>
    <p>Posted by <a href="#">{{ $post->first_name . " " . $post->last_name }}</a> on {{ date("F j, Y", strtotime($post->created_at)) }} <a href="#">comments({{ $post->comments }})</a></p>
    <p>{!! $post->description !!}</p>
    <div class="about-btn">
        <a href="{{ route("single", ['id' => $post->id]) }}">Read More</a>
    </div>
</div>