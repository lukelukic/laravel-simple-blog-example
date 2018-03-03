<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    {{ $post->title }}
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route("posts.show", ['id' => $post->id]) }}">Edit</a></li>
                            <li><a href="{{ route('posts.delete', ['id' => $post->id]) }}">Delete</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home{{ $post->id }}" data-toggle="tab">Content</a></li>
                    <li role="presentation"><a href="#profile{{ $post->id }}" data-toggle="tab">Picture</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home{{ $post->id }}">
                        <b>Content</b>
                        <p>
                            {!! $post->content !!}
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile{{ $post->id }}">
                        <img src="{{ asset($post->file) }}" alt="{{ $post->alt }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>