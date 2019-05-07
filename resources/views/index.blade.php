<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/site/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/site/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="/site/css/index.css">
</head>
<body>
<header class="container mt-5 mb-4">
    <!-- Navbar content -->

@include('layouts.index.navbar')

</header>

<div class="container mb-5">

    <div class="row">

        <div class="col-7">

            @yield('offer')

        </div>
        <div class="col-2 text-center">
            <!--adv-->
            <img src="/site/img/adv/2.jpg" alt="" class="img-fluid">
            <img src="/site/img/adv/7.jpg" alt="" class="img-fluid">
            <img src="/site/img/adv/fajr37.jpg" alt="" class="img-fluid">
        </div>
        @yield('row')
    </div>

    @yield('content')

</div>

@include('layouts.index.footer')

<script src="/site/js/jquery.min.js"></script>
<script src="/site/js/bootstrap/bootstrap.min.js"></script>
<script src="/site/js/index.js"></script>
</body>
</html>