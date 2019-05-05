@extends('index')
@section('content')
    <div class="about-us">
        <div class="container ">
            <div class="img-about-us col-md-6 center">
                <img src="{{asset('/storage/public/upload/'.$articles->article_pic) }}" width="100%" height="450px" ;>
            </div>
            <div class="exp-about-us col-md-6 center">
                <h2>
                    <small><b> {{$articles->title}}</b></small>
                </h2>
                <p>
                    {{$articles->body}}
                </p>
            </div>
        </div>
        <div class='contact-us'>
            <div class='container'>
                <form action='' method='POST'>
                    <div class='form-group'>
                        <input class='form-control' type='hidden' name='uid' value="">
                        <div class='form-group'>
                            <input class='form-control' type='hidden' name='date' value=''>
                        </div>
                        <div class='form-group'>
                            <label> ارسال نظر:</label>
                            <textarea class='form-control' row='5' name='message'></textarea>
                        </div>
                        <button type='submit' class='btn btn-info' name='commentSubmit'>ارسال</button>
                </form>
            </div>
        </div>
    </div>

@endsection