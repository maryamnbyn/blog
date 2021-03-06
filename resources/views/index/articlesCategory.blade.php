@extends('index')

@section('title')
  {{$category->name}}
@endsection

@section('content')
    <div class="row">
        @foreach($articles as $article)
            <div class="col-4">
                <div class="media py-2 border-bottom ">
                    <img src="{{asset('storage/public/upload/'.$article->article_pic)}}" class="align-self-start ml-3 img-fluid" style="width:80px">
                    <div class="media-body">
                        <a href="{{route('articles.show',['article' => $article->slug])}}" class="side-link">{{$article->section_body}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection


