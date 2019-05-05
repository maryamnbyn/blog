<div class="container-fluid menu-place">
    <nav class="navbar navbar-expand-lg" id="menu">
        <button class="navbar-toggler float-left ml-4 mt-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hvr-underline-from-center" href="/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        خانه
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hvr-underline-from-center" href="/category" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        مقالات
                    </a>
                </li>
            </ul>
            @if(Auth::check())

                <div class="nav navbar-left" style="margin-right:850px">
                    <form action="{{route('logout')}}" method="post">
                        {!! csrf_field() !!}
                        <button class="btn btn-xs btn-warning">خروج از حساب کاربری</button>

                    </form>
                </div>
            @else

                    <ul class="nav navbar-left nav-item"  style="margin-right:1050px ">
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
    <!--    <div class="row" style="min-height: 2px; background: black; position: absolute; top: 38px; width: 100%;"></div>-->

</div>
