@extends("layouts.front")

@section("title") Coffee - About page @endsection

@section('content')
    <div class="welcome">
        <div class="container">
            <div class="welcome-top heading">
                <h3>WELCOME</h3>
                <div class="welcome-bottom">
                    <img src="{{ asset("images/abt-1.jp") }}g" alt=""/>
                    <p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.</p>
                    <p>Nulla in tempor lectus. Etiam ac mauris lacinia nulla ultricies porta sit amet eleifend ligula. Quisque tincidunt vitae turpis at efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sagittis, magna a sagittis dapibus, ipsum metus interdum lectus, quis feugiat leo ipsum nec diam.</p>
                </div>
            </div>
        </div>
    </div>
    @component("front.components.gallery_slides", [
        'pictures' => $galleryPictures
    ])@endcomponent
@endsection