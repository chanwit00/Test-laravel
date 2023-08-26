@extends('layouts.master')
@section('title') PhoneShop | รายการสินค้า @stop
@section('content')

<h1>แก้ไขสินค้า </h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('phone') }}">หน้าแรก</a></li>
    <li class="active">แก้ไขสินค้า </li>
</ul>

{!! Form::model($phone, array('action' => 'App\Http\Controllers\PhoneController@update',
'method' => 'post', 'enctype' => 'multipart/form-data')) !!}
<input type="hidden" name="id" value="{{ $phone->id }}">

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
        <strong>ข้อมูลสินค้า </strong>
    </div>
</div>
<div class="panel-body">

<table>

    <tr>
        <td>{{ Form::label('id', 'รหัสสินค้า') }} </td>
        <td>{{ Form::text('id', $phone->id, ['class' => 'form-control']) }}</td>
    </tr>

    <tr>
        <td>{{ Form::label('title', 'ชื่อสินค้า ') }}</td>
        <td>{{ Form::text('title', $phone->title, ['class' => 'form-control']) }}</td>
    </tr>

    <tr>
        <td>{{ Form::label('typephone_id', 'ประเภทสินค้า ') }}</td>
        <td>{{ Form::select('typephone_id', $typephone, Request::old('typephone_id'), ['class' => 'form-control']) }}</td>
    </tr>

    <tr>
        <td>{{ Form::label('price', 'ราคาสินค้า') }}</td>
        <td>{{ Form::text('price', $phone->price, ['class' => 'form-control']) }}</td>
    </tr>

    <tr>
        <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
        <td>{{ Form::file('image') }}</td>
    </tr>

    @if($phone->image_url)
    <tr>
    <td><strong>รูปสินค้า </strong></td>
    <td><img src="{{ URL::to($phone->image_url) }}" width="100px"></td>
    </tr> 
    @endif

    

</table>

</div>

<div class="panel-footer">
    <button type="reset" class="btn btn-danger">ยกเลิก</button>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
</div>
</div>


{!! Form::close() !!}

@endsection