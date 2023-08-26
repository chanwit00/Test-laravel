<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ชื่อบนTab --}}
    <title>@yield("title", "PHONE | จําหน่ายโทรศัพท์ออนไลน์")</title> 
    
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

</head>

<body>
    <center><h4>นาย ชาญวิทย์ เคนวงษ์ 6406041621081 </h4></center>
    {{-- แถบ nav bar ข้างบน  --}}
    <nav class="navbar navbar-default navbar-static-top">
        
        <div class="navbar-header">
        <a href="#" class="navbar-brand">Phone</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                        <li><a href="#">หน้าแรก</a></li>
                        <li><a href="{{ URL::to('phone') }}">ข้อมูลสินค้า </a></li>
                        <li><a href="#">รายงาน</a></li>
                        <li><a href="{{ URL::to('typephone') }}">ประเภทสินค้า</a></li>
                </ul>
        </div>
    @yield("content")
    @if(session('msg'))
    @if(session('ok'))
        <script>toastr.success("{{ session('msg') }}")</script>
    @else
        <script>toastr.error("{{ session('msg') }}")</script>
        @endif
    @endif
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')   }}"></script>

</body>
</html>



