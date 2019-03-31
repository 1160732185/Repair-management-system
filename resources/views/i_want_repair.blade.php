@extends('htmlmodel')
@section('content')
    <script src="/js/ajaxindex.js"></script>
    <h1>报修信息</h1>
    {!! Form::open(['url'=>'/confirm']) !!}
    <div class="form-group">
        {!! Form::label('报修人工号') !!}
        {!! Form::text('worknumber', session('worknumber'),['autocomplete'=>"off",'class'=>'form-control','disabled'=>"disabled"]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('所属部门') !!}
        {!! Form::text('department',session('department'),['autocomplete'=>"off",'class'=>'form-control','disabled'=>"disabled"]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('联系电话') !!}
        {!! Form::text('phone',null,['autocomplete'=>"off",'class'=>'form-control','placeholder'=>'请输入联系电话']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('楼宇楼层') !!}
        {!! Form::text('floor',null,['autocomplete'=>"off",'class'=>'form-control','placeholder'=>'请输入楼层（可选）']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('故障描述') !!}
        {!! Form::text('description',null,['autocomplete'=>"off",'class'=>'form-control','placeholder'=>'请描述故障']) !!}
    </div>
    <h1>报修设备</h1>
    <div class="form-group">
        {!! Form::label('设备序列号') !!}
        {!! Form::text('equipment_id',null,['autocomplete'=>"off",'id'=>'number','class'=>'form-control','placeholder'=>'请填写序列号']) !!}
    </div>
    <font size="3" color="red">
        @if (isset($_GET['iderr'])) 不存在此序列号！ @endif
    </font>
    <div class="form-group">
        {!! Form::label('设备位置') !!}
        {!! Form::text('equipment_location',null,['autocomplete'=>"off",'id'=>'location','class'=>'form-control','placeholder'=>'请填写序列号']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('设备使用人') !!}
        {!! Form::text('equipment_user',null,['autocomplete'=>"off",'id'=>'user','class'=>'form-control','placeholder'=>'请填写序列号']) !!}
    </div>
    {!! Form::submit('提交订单',['class'=>'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
    @extends('errors')
@stop