@extends("layouts.front")

@section("title")
    Coffee - Home Page
@endsection

@section("content")
    <div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    @isset($lastPost)
                        @component("front.components.featured_post",[
                            'post' => $lastPost
                        ])@endcomponent
                    @endisset
                    @isset($posts)
                        <div class="about-tre">
                            <div class="a-1">
                               @foreach($posts as $post)
                                    <div class="col-md-6 abt-left">
                                        @component("front.components.post_preview",[
                                    'post' => $post
                                ])@endcomponent
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </div>
                   @endisset
                </div>
                <div class="col-md-4 about-right heading">
                    @include("front.components.about_preview")
                    @isset($latestPosts)
                        <div class="abt-2">
                            <h3>YOU MIGHT ALSO LIKE</h3>
                            @foreach($latestPosts as $post)
                                @component("front.components.post_preview_sidebar",[
                                    'post' => $post
                                ])@endcomponent
                            @endforeach
                        </div>
                    @endisset
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @isset($galleryPictures)
        @component("front.components.gallery_slides",[
            'pictures' => $galleryPictures
        ])@endcomponent
    @endisset
@endsection