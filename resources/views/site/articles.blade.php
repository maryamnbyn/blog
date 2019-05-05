@extends('index')
@section('content')
    <title>مقاله ها</title>
                    <main role="main">
                        <div class="album py-5 bg-light">
                            <div class="container-fluid">
                                <div class="content_owla-carousel rounded my-3">
                                    <div class="border-bottom mx-5 py-4 mb-2">
                                        <span class="title border-bottom font-weight-bold px-3 h5">مقالات</span>
                                    </div>
                            <div class="container">
                                <div class="row">
                                    @foreach($articles as $article)
                                    <div class="col-12 col-md-4">
                                        <div class="card mb-4 box-shadow">
                                            <img class="fix-pic fix-height" src="{{asset('storage/public/upload/'.$article->article_pic)}}" alt="Card image cap">
                                            <div class="card-body">
                                                <p class="card-text">{{Str::words($article->body,30)}}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="{{route('articles.show',['id' => $article->body])}}" type="button" class="btn btn-sm btn-outline-secondary">ویرایش</a>
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
                        </div>
                    </main>

@endsection