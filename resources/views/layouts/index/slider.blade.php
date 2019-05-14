<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach( $slide_articles as $id => $article )
            @if($id == 1)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$id}}" class="active"></li>
            @else
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$id}}"></li>
            @endif
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach( $slide_articles as $id => $article )
            @if($id == 1)
                <div class="carousel-item active">
                    <a href="{{route('articles.show', $article->slug)}}">
                    <img src="{{asset('storage/public/upload/'.$article->article_pic)}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$article->title}}</h5>
                        </div>
                    </a>
                </div>
                @else
                <div class="carousel-item">
                    <a href="{{route('articles.show', $article->slug)}}">
                        <img src="{{asset('storage/public/upload/'.$article->article_pic)}}" class="d-block w-100"
                             alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$article->title}}</h5>
                        </div>
                    </a>
                </div>
                @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
