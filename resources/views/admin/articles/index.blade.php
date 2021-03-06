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
                        <h2 class="pageheader-title">لیست مقاله ها</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit
                            amet vestibulum mi. Morbi lobortis pulvinar quam.</p>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header body">لیست دسته بندی ها</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام مقاله</th>
                                        <th>ایجاد کننده مقاله</th>
                                        <th>متن مقاله</th>
                                        <th>تعداد بازدید</th>
                                        <th>ویرایش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td></td>
                                            <td>{{ Str::words($article->title,3) }}</td>
                                            <td>{{$article->user->full_name}}</td>
                                            <td>{{ $article->section_body }}</td>
                                            <td>{{ $article->count }}</td>
                                            <td>
                                                <form action="{{ route('admin.articles.destroy',['article' =>$article->slug ]) }}" method="POST">
                                                    <a class="btn btn-primary"
                                                       href="{{ route('admin.articles.edit',['article' =>$article->slug ])  }}">ویرایش</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onClick="deleteme({{$article->id}})">حذف
                                                    </button>
                                                </form>
                                            </td>
                                            <script language="javascript">
                                                function deleteme(id) {
                                                    if (confirm("Do you want Delete!")) {
                                                        window.location.href = 'article.destroy?del=' + id + '';
                                                        return true;
                                                    }
                                                }
                                            </script>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                    {{--@endforeach--}}

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection