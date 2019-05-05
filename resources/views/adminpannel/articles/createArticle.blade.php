@extends('adminpannel')
@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">ثبت مقاله جدید</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>

                    </div>
                </div>
            </div>

            <div class="row">
                <!-- ============================================================== -->
                <!-- valifation types -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($errors))
                                <div class="alert alert-danger">
                                    <ui>
                                        @foreach($errors->all() as $error)
                                            <li> {{$error}}</li>
                                        @endforeach
                                    </ui>
                                </div>
                            @endif
                            <form id="validationform" action="{{route('article.store')}}" data-parsley-validate="" novalidate="" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">عنوان مقاله:</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" name="title" class="form-control" autofocus="autofocus">                            </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">دسته بندی:</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select type="text" name="category" class="form-control" placeholder="categoryID">
                                            @foreach($categories as $category)

                                                <option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">آپلود عکس مقاله:</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="file" name="articlePic" class="form-control" placeholder="عکس فایل"/>                            </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">متن مقاله:</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea type="text" name="body" class="form-control" autofocus="autofocus"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <button type="submit" class="btn btn-space btn-primary">ایجاد مقاله جدید</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end valifation types -->
                <!-- ============================================================== -->
            </div>

        </div>
    </div>

@endsection