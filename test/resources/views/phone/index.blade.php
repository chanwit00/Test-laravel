@extends('layouts.master')
@section('title') PhoneShop | รายการสินค้า @stop
@section('content')

    <div class="container">

        <h1>รายการสินค้า </h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><strong>รายการ</strong></div>
            </div>

            <div class="panel-body">

                <form action="{{ URL::to('phone/search') }}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <input type="text" name="q" class="form-control" placeholder="...">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                    <a href="{{ URL::to('phone/edit') }}" class="btn btn-success pull-right">เพิ่มสินค้า
                    </a>
                </form>

            </div>


            <table class="table table-bordered bs-table">

            </table>
            <table class="table table-bordered bs-table">
                <thead>
                    <tr>
                        <th>รูปสินค้า </th>
                        <th>รหัส </th>
                        <th>ชื่อสินค้า </th>
                        <th>ประเภท </th>
                        <th>ราคาต่อหน่วย </th>
                        <th>การทำงาน </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($phone as $p)
                        <tr>
                            <td><img src="{{ $p->image_url }}" width="50px"></td>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->typephone->name }}</td>
                            <td class="bs-price">{{ number_format($p->price, 2) }}</td>

                            <td class="bs-center">
                                <a href="{{ URL::to('phone/edit/' . $p->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit"></i> แก้ไข</a>
                                <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}"><i
                                        class="fa fa-trash"></i> ลบ</a>


                            </td>

                        </tr>
                    @endforeach
                </tbody>

                {{-- หาผลรวม --}}
                <tfoot>
                    <tr>
                        <th colspan="4">รวม</th>
                        <th class="bs-price">{{ number_format($phone->sum('price'), 2) }}</th>
                        <th class="bs-price"></th>
                    </tr>
                </tfoot>

            </table>
            <div class="panel-footer">
                <span>แสดงข้อมูลจํานวน {{ count($phone) }} รายการ</span>
            </div>
        </div>
    </div>




    <div class="container">
        {{ $phone->links() }}
    </div>


    <script>
        $('.btn-delete').on('click', function() {
            if (confirm("คุณต้องการลบข้อมูลสินค้าหรือไม่?")) {
                var url = "{{ URL::to('phone/remove') }}" +
                    '/' + $(this).attr('id-delete');
                window.location.href = url;
            }
        });
    </script>

@endsection
