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
                <div class="col-12 mt-4">
                    <!--form-->
                    <form action="/site/action_page.php" class="mb-5">
                        <div class="form-group">
                            <label for="name">نام:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="comment">نظر:</label>
                            <textarea name="" class="form-control" id="comment" cols="30" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">ارسال نظر</button>
                    </form>
                    <!--COMMENTS-->
                    <div class="media border p-3 my-2">
                        <img src="/site/img/img_avatar3.png" alt="John Doe" class="ml-3 mt-3 rounded-circle"
                             style="width:60px;">
                        <div class="media-body">
                            <h6>نام کاربری
                                <small><i class="mr-3">تاریخ انتشار:</i></small>
                            </h6>
                            <p style="font-size: 12px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="media border p-3 my-2">
                        <img src="/site/img/img_avatar3.png" alt="John Doe" class="ml-3 mt-3 rounded-circle"
                             style="width:60px;">
                        <div class="media-body">
                            <h6>نام کاربری
                                <small><i class="mr-3">تاریخ انتشار:</i></small>
                            </h6>
                            <p style="font-size: 12px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.index.sidebar')
        </div>
    </div>
@endsection


