<nav class="nav navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mr-0" href="/">کتاب دونی</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto pr-3">
            <li class="nav-item active">
                <a class="nav-link" href="/"> خانه <span class="sr-only">(current)</span></a>
            </li>
            <li class="dropdown open">
                <a href="#" class="nav-link dropdown-toggle pointer" id="dropdownMenuButton"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    مقالات
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li class="rtl">
                        @foreach($categories as $category)

                            <a class="sub_sub_menu link-subtitle nav-link"
                               href="{{route('category.show',['category' =>$category->slug ])}}">
                                <option value="{{$category->id}}">{{$category->name}}</option>

                                @endforeach

                            </a>
                    </li>
                </ul>

            </li>

        </ul>
        <ul class=" navbar-nav pr-3 a">
        @if(Auth::check())

            <li>
                <form action="{{route('logout')}}" method="post">
                    {!! csrf_field() !!}
                    <button class="logout-btn" style="margin-left: 10px">خروج از حساب کاربری</button>
                </form>
            </li>
            @if(Auth::user()->role == 'admin')
                    <li>
                        <a href="/admin/dashboard" style="margin-left: 10px">ادمین پنل</a>
                    </li>


            @endif
        @else
                <li>
                    <a href="/login" style="margin-left: 10px">ورود</a>
                </li>

                <li>
                    <a href="/register">عضویت</a>
                </li>

        @endif
        </ul>
    </div>
</nav>
