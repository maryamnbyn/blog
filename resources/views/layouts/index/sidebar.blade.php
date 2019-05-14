<div class="col-3">
    <!--links-->
    <ul class="nav nav-tabs pr-0" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true">پربیننده ترین</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false">تازه ترین</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            @foreach( $view_count as $count )

                <div class="media py-2 border-bottom ">
                    <div class="media-body">
                        <a href="{{route('articles.show',$count->slug)}}" class="side-link">
                            {{$count->section_body}}
                        </a>
                    </div>
                    <img src="{{asset('storage/public/upload/'.$count->article_pic)}}"
                         class="align-self-start mr-3 img-fluid" style="width:80px">
                </div>

            @endforeach

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            @foreach( $articles as $article )

                <div class="media py-2 border-bottom ">
                    <div class="media-body">
                        <a href="{{route('articles.show',['article' => $article->slug])}}" class="side-link">
                            {{$article->section_body}}
                        </a>
                    </div>
                    <img src="{{asset('storage/public/upload/'.$article->article_pic)}}"
                         class="align-self-start mr-3 img-fluid" style="width:80px">
                </div>

            @endforeach

        </div>
    </div>
</div>
