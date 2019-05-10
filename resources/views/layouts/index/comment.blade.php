<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="col-12 mt-4">
    <!--form-->

    <form action="{{route('comment.store')}}" class="mb-5" method="post" id="comment_form">
        @csrf
        <div class="form-group">
            <label for="comment">نظر:</label>
            <textarea name="comment" class="form-control" id="comment" cols="30" rows="4"></textarea>
        </div>
        <input type="hidden" name="article_id" value="{{$article->id}}" id="article_id">
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
            <p style="font-size: 12px" id="comment_message">{{$comment->body}}</p>
        </div>
    </div>
    @endforeach

</div>
<script>
    $(document).ready(function(){

        $('#comment_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{ route('comment.store') }}",
                method:"POST",
                data:form_data,
                dataType:"JSON",
                success:function(data)
                {

                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#article_id').val('0');
                        load_comment();

                }
            })
        });

        load_comment();

        function load_comment()
        {
            $.ajax({
                url:"{{route('comment.index')}}",
                method:"POST",
                success:function(data)
                {
                    $('#display_comment').html(data);
                }
            })
        }

        $(document).on('click', '.reply', function(){
            var comment_id = $(this).attr("id");
            $('#article_id').val(comment_id);
            $('#comment_name').focus();
        });

    });
</script>