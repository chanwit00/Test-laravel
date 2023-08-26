@extends('layouts.master')
@section('title') PhoneShop | รายการสินค้า @stop
@section('content')

<h1>แก้ไขประเภทสินค้า </h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('typephone') }}">หน้าแรก</a></li>
    <li class="active">แก้ไขประเภทสินค้า </li>
</ul>

{!! Form::model($typephone, array('action' => 'App\Http\Controllers\TypephoneController@update',
'method' => 'post', 'enctype' => 'multipart/form-data')) !!}
<input type="hidden" name="id" value="{{ $typephone->id }}">

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
        <strong>ข้อมูลประเภทสินค้า </strong>
    </div>
</div>
<div class="panel-body">

<table>

    <tr>
        <td>{{ Form::label('id', 'รหัสสินค้า') }} </td>
        <td>{{ Form::text('id', $typephone->id, ['class' => 'form-control']) }}</td>
    </tr>

    <tr>
        <td>{{ Form::label('name', 'ประเภทสินค้า ') }}</td>
        <td>{{ Form::text('name', $typephone->name, ['class' => 'form-control']) }}</td>
    </tr>

</table>

</div>

<div class="panel-footer">
    <button type="reset" class="btn btn-danger">ยกเลิก</button>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
</div>
</div>


{!! Form::close() !!}

@endsection