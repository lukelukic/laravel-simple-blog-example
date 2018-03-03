<a href="{{ route("single", ['id' => $post->id]) }}"><img src="{{ asset($post->file) }}" class="img-responsive" alt="{{ asset($post->alt) }}"></a>
<h3><a href="{{ route("single", ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
<p>{!!   $post->description !!}</p>
<label>{{ date("F j, Y", strtotime($post->created_at)) }}</label>