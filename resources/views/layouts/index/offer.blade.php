<div class="title mt-4">
    <span style="font-size: 13px;">آخرین مقالات</span>
</div>
<div class="col-12 px-0">
    <div class="row">
        @foreach( $articles as $article )
        <div class="col-4 mt-4">
            <div class="border p-2">
                <img src="{{asset('storage/public/upload/'.$article->article_pic)}}" class="img-fluid" alt="">
                <div class="media-body">
                    <a href="{{route('articles.show',['article' => $article->slug])}}" class="side-link">
                        {{$article->section_body}}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>