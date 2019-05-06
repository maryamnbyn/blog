<nav class="nav navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand mr-0" href="#">نام سایت</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto pr-3">
                <li class="nav-item active">
                    <a class="nav-link" href="/"> خانه <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category">مقالات</a>
                </li>
            </ul>
            @if(Auth::check())

                <div class="navbar-nav pr-3 a" >
                    <form action="{{route('logout')}}" method="post">
                        {!! csrf_field() !!}
                        <button class="btn btn-xs btn-warning">خروج از حساب کاربری</button>

                    </form>
                </div>
            @else

                <ul class=" navbar-nav pr-3 a">
                    <li>
                        <a href="/login" style="margin-left: 10px">ورود</a>
                    </li>

                    <li>
                        <a href="/register">عضویت</a>
                    </li>

                </ul>

            @endif
        </div>
</nav>
