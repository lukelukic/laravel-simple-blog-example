<div class="slide">
    <div class="container">
        <div class="fle-xsel">
            <ul id="flexiselDemo3">
                @foreach($pictures as $p)
                    <li>
                        <a href="#">
                            <div class="banner-1">
                                <img src="{{ asset($p->file) }}" class="img-responsive" alt="{{ $p->alt }}">
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>