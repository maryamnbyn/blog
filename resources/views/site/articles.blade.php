@extends('index')
@section('content')
    <title>مقاله ها</title>

    <div class="container-fluid">
        <div class="content_owla-carousel rounded my-3">
            <div class="border-bottom mx-5 py-4 mb-2">
                <span class="title border-bottom font-weight-bold px-3 h5">مقالات</span>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-md-3 col-sm-6 row-margin">
                        <div class="card" >
                            <div class="card-block" >
                                <img src="{{asset('storage/public/upload/'.$article->article_pic)}}" alt="" class="fix-pic">
                                <div class="card-text">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$article->title}}</h4>
                                        <a href="#" class="btn btn-primary">مشاهده</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection