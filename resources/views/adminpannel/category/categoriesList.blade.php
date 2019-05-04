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
                        <h2 class="pageheader-title">جدول ویرایش دسته بندی ها</h2>
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
                                        <th>نام دسته بندی</th>
                                        <th>ایجاد کننده دسته بندی</th>
                                        <th>ویرایش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td></td>
                                            <td>{{$category['name']}}</td>
                                            <td>{{ $category->user['name'] }}</td>
                                            <td>
                                                <form action="{{ route('category.destroy',$category['id']) }}" method="POST">
                                                    <a class="btn btn-primary"
                                                       href="{{ route('category.edit',$category['id']) }}">ویرایش</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onClick="deleteme({{$category['id']}})">حذف
                                                    </button>
                                                </form>
                                            </td>
                                            <script language="javascript">
                                                function deleteme(id) {
                                                    if (confirm("Do you want Delete!")) {
                                                        window.location.href = 'category.destroy?del=' + id + '';
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