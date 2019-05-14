@extends('index')

@section('title')
    {{$article->title}}
@endsection

@section('content')
    <body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-2">
                <img src="/site/img/2.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7">
                <!--title-->

                <p class="h5">{{$article['title']}}</p>
                <div class="row">
                    <div class="col-7">
                        <!--summery-->
                        <p class="h6"></p>
                        <p class="h6"></p>
                        <!--author name-->
                        <p class="h6">{{$article->user['full_name']}}</p>
                    </div>
                    <div class="col-5 text-left">
                        <!--image-->
                        <img src="{{asset('storage/public/upload/'.$article['article_pic'])}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <!--content-->
                    <p class="content">
                        {{$article['body']}}
                    </p>
                </div>
                @if(Auth::check())

                    <div class="col-12 mt-4">
                        <!--form-->

                        <form action="{{route('comment.store')}}" class="mb-5" method="post" id="comment_form">
                            @csrf
                            <div class="form-group">
                                <label for="comment">نظر:</label>
                                <textarea name="comment" class="form-control" id="comment" cols="30" rows="4" required></textarea>
                            </div>
                            <input type="hidden" name="article_id" value="{{$article['id']}}" id="article_id">
                            <button type="submit" class="btn btn-primary">ارسال نظر</button>
                        </form>

                        <!--COMMENTS-->

                        <div id="comment_content">

                            @foreach($article->comments as $comment)
                                <div class="media border p-3 my-2" id="comment_box">
                                    <img src="/site/img/img_avatar3.png" alt="John Doe" class="ml-3 mt-3 rounded-circle" style="width:60px;">
                                    <div class="media-body">
                                        <h6>
                                            <small><i class="mr-3" id="created_at">{{$comment->user->full_name}}</i></small>
                                        </h6>
                                        <h6>
                                            <small><i class="mr-3" id="created_at">{{ verta($comment->created_at)->formatDifference() }}</i></small>
                                        </h6>
                                        <p style="font-size: 12px" id="comment_message">{{ $comment->body }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @section('script')
                    <script>
                        $(document).ready(function () {
                            $('#comment_form').on('submit', function (event) {
                                event.preventDefault();
                                const comment = $(this).find("#comment").val();
                                const created_at = "{{verta()->formatDifference()}}";
                                const user_name = "{{(Auth()->user()->name)." ".(Auth()->user()->family)}}"
                                var form_data = $(this).serialize();
                                $.ajax({
                                    url: "{{ route('comment.store') }}",
                                    method: "POST",
                                    data: form_data,
                                    success: function () {
                                        $('#comment_form')[0].reset();
                                        $('#comment_content').append('<div class="media border p-3 my-2" id="comment_box">\n' +
                                            '            <img src="/site/img/img_avatar3.png" alt="John Doe" class="ml-3 mt-3 rounded-circle"\n' +
                                            '                 style="width:60px;">\n' +
                                            '\n' +
                                            '            <div class="media-body">\n' +
                                            '                <h6>\n' +
                                            '                    <small><i class="mr-3">' + created_at + '</i></small>\n' +
                                            '                </h6>\n' +
                                            '                <h6>\n' +
                                            '                    <small><i class="mr-3">' + user_name + '</i></small>\n' +
                                            '                </h6>\n' +
                                            '                <p style="font-size: 12px" id="comment_message">' + comment + '</p>\n' +
                                            '            </div>\n' +
                                            '        </div>')
                                    }
                                })
                            });
                        });
                    </script>
                @endsection
                @else
                    <a href="/login">
                        برای ارسال کامنت باید ابتدا وارد حساب کاربری خود شوید!
                    </a>
                @endif

            </div>

            @include('layouts.index.sidebar')

        </div>
    </div>
    @endsection



