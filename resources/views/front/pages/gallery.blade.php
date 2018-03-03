@extends("layouts.front")

@section('title') Coffe - Gallery @endsection

@section("content")
    <div class="gallery">
        <div class="container">
            <div class="gallery-top heading">
                <h3>OUR GALLERY</h3>
            </div>
            @if(count($galleries))
                <section>
                    <ul id="da-thumbs" class="da-thumbs">
                        @foreach($galleries as $gallery)
                            <li>
                                <a href="{{ asset($gallery->file) }}" rel="title" class="b-link-stripe b-animate-go  thickbox">
                                    <img src="{{ asset($gallery->file) }}" alt="{{ $gallery->alt }}" />
                                    <div>
                                        <h5>$gallery->title</h5>
                                        <span>{{ $gallery->description }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        <div class="clearfix"> </div>
                    </ul>
                </section>
            @else
                <h2>Sorry, currently gallery has no records.</h2>
            @endif

            <script type="text/javascript">
                $(function() {

                    $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

                });
            </script>
        </div>
    </div>
@endsection