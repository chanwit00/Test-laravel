@extends('layouts.master')
@section('title') PhoneShop | รายการสินค้า @stop
@section('content')

<div class="container">

    <h1>ประเภทสินค้า </h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><strong>รายการ</strong></div>
        </div>
        <div class="panel-body">

            <form action="{{ URL::to('typephone/search') }}" method="post" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="...">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
                <a href="{{ URL::to('typephone/edit') }}" class="btn btn-success pull-right">เพิ่มประเภทสินค้า
                </a>
            </form>
        </div>

        <table class="table table-bordered bs-table">
            <thead>
                <tr>
                    <th>รหัส </th>
                    <th>ชื่อประเภท </th>
                    <th>การทำงาน </th>

                </tr>
            </thead>

            <tbody>
                @foreach ($typephones as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name }}</td>


                        <td class="bs-center">
                            <a href="{{ URL::to('typephone/edit/' . $c->id) }}" class="btn btn-info"><i
                                    class="fa fa-edit"></i> แก้ไข</a>
                            <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $c->id }}"><i
                                    class="fa fa-trash"></i> ลบ</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>


        </table>

        <tfoot>
            <th class="bs-categoryall">
                <h4> ยอดรวมทั้งหมด {{ number_format($typephones->count(), 0) }} รายการ </h4>
            </th>
        </tfoot>


        <div class="container">
            {{ $typephones->links() }}
        </div>


<script>
    $('.btn-delete').on('click', function() {
        if (confirm("คุณต้องการลบข้อมูลสินค้าหรือไม่?")) {
            var url = "{{ URL::to('typephone/remove') }}" +
                '/' + $(this).attr('id-delete');
            window.location.href = url;
        }
    });
</script>

@endsection