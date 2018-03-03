<!--header-top-starts-->
<div class="header-top">
    <div class="container">
        <div class="head-main">
            <a href="index.html"><img src="{{ asset("images/logo-1.png") }}" alt="" /></a>
        </div>
    </div>
</div>
<!--header-top-end-->
<!--start-header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class="navigation">
                <span class="menu"></span>
                <ul class="navig">
                    @foreach($nav as $n)
                        <li><a href="{{ url($n->route) }}">{{ $n->name }}</a></li>
                    @endforeach
                    @if(session()->has('user'))
                        @if(session()->get('user')->role == 'admin')
                                <li><a href="{{ route("users.index") }}">Admin panel</a></li>
                        @endif
                        <li><a href="{{ route("logout") }}">Logout</a></li>
                    @else
                            <li><a href="{{ route("loginForm") }}">Login</a></li>
                            <li><a href="{{ route("registerForm") }}">Register</a></li>
                    @endif
                </ul>
            </div>
            @isset($socialNetworks)
                <div class="header-right">
                    <ul>
                        @foreach($socialNetworks as $sn)
                            <li><a href="{{ $sn->url }}"><i class="fa fa-{{ $sn->icon }}"> </i></a></li>
                        @endforeach
                    </ul>
                </div>
            @endisset
            <div class="clearfix"></div>
        </div>
    </div>
</div>