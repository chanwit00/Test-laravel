@extends("layouts.master") 
@section('title') PhoneShop | เพิ่มข้อมูลสินค้า @stop
@section('content')

<h1>เพิ่มประเภทสินค้า </h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('typephone') }}">หน้าแรก</a></li>
    <li class="active">เพิ่มประเภทสินค้า </li>
</ul>

{!! Form::open(array('action' => 'App\Http\Controllers\TypephoneController@insert','method'=>'post', 'enctype' => 'multipart/form-data')) !!}
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
            <strong>เพิ่มประเภทสินค้า </strong>
        </div>
    </div>
    <div class="panel-body">
        
        <table>

            <tr>
                <td>{{ Form::label('name', 'ประเภทสินค้า ') }}</td>
                <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
            </tr>
        
            
        
        </table>
        


    <div class="panel-footer">
        <button type="reset" class="btn btn-danger">ยกเลิก</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>
    </div>


{!! Form::close() !!}

@endsection