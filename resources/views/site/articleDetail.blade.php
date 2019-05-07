<title>خانه</title>
@extends('index')
@section('content')
    <body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-2">
                <img src="/site/img/2.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7">
                <!--title-->

                <p class="h5">{{$article->title}}</p>
                <div class="row">
                    <div class="col-7">
                        <!--summery-->
                        <p class="h6">{{$article->title}}</p>
                        <p class="h6">{{$article->title}}</p>
                        <!--author name-->
                        <p class="h6">{{$article->user->full_name}}</p>
                    </div>
                    <div class="col-5 text-left">
                        <!--image-->
                        <img src="{{asset('storage/public/upload/'.$article->article_pic)}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <!--content-->
                    <p class="content">
                        {{$article->body}}
                    </p>
                </div>
                @if(Auth::check())
                @include('layouts.index.comment')
                    @else
<a href="/login"> برای ارسال کامنت باید ابتدا وارد حساب کاربری خود شوید!</a>


                @endif
            </div>
            @include('layouts.index.sidebar')
        </div>
    </div>
@endsection


