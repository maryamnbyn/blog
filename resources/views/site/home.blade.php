<title>خانه</title>
@extends('index')
@section('offer')
    <!-- start slider-->

    @include('layouts.index.slider')
    @include('layouts.index.offer')

@endsection
    <!-- end slider-->

@section('row')
    @include('layouts.index.sidebar')

@endsection

@section('content')

    @include('layouts.index.category')

@endsection


