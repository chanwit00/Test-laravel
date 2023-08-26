@extends("layouts.master") 
@section('title') PhoneShop | เพิ่มข้อมูลสินค้า @stop
@section('content')

<h1>เพิ่มข้อมูลสินค้า </h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('phone') }}">หน้าแรก</a></li>
    <li class="active">เพิ่มข้อมูลสินค้า </li>
</ul>

{!! Form::open(array('action' => 'App\Http\Controllers\PhoneController@insert','method'=>'post', 'enctype' => 'multipart/form-data')) !!}
@if($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

    <div class="panel panel-default">
        <div class="panel-heading">
        <div class="panel-title">
            <strong>เพิ่มข้อมูลสินค้า </strong>
        </div>
    </div>
    <div class="panel-body">
        
        <table>

            <tr>
                <td>{{ Form::label('id', 'รหัสสินค้า') }} </td>
                <td>{{ Form::text('id', Request::old('id'), ['class' => 'form-control']) }}</td>
            </tr>
        
            <tr>
                <td>{{ Form::label('title', 'ชื่อสินค้า ') }}</td>
                <td>{{ Form::text('title', Request::old('title'), ['class' => 'form-control']) }}</td>
            </tr>
        
            <tr>
                <td>{{ Form::label('typephone_id', 'ประเภทสินค้า ') }}</td>
                <td>{{ Form::select('typephone_id', $typephone, Request::old('typephone_id'), ['class' => 'form-control']) }}</td>
            </tr>
        
            <tr>
                <td>{{ Form::label('price', 'ราคาสินค้า') }}</td>
                <td>{{ Form::text('price', Request::old('price'), ['class' => 'form-control']) }}</td>
            </tr>
        
            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>
            
        
        </table>
        


    <div class="panel-footer">
        <button type="reset" class="btn btn-danger">ยกเลิก</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>
    </div>


{!! Form::close() !!}

@endsection