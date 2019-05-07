<div class="col-12 mt-4">
    <!--form-->

    <form action="{{route('comment.store')}}" class="mb-5" method="post">
        @csrf
        <div class="form-group">
            <label for="comment">نظر:</label>
            <textarea name="comment" class="form-control" id="comment" cols="30" rows="4"></textarea>
        </div>
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <button type="submit" class="btn btn-primary">ارسال نظر</button>
    </form>

    <!--COMMENTS-->
    @foreach($article->comments as $comment)

    <div class="media border p-3 my-2">
        <img src="/site/img/img_avatar3.png" alt="John Doe" class="ml-3 mt-3 rounded-circle"
             style="width:60px;">

        <div class="media-body">
            <h6>{{$article->user->full_name}}
                <small><i class="mr-3">{{$comment->created_at}}</i></small>
            </h6>
            <p style="font-size: 12px">{{$comment->body}}</p>
        </div>
    </div>
    @endforeach

</div>