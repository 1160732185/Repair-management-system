@extends('htmlmodel')
@section('content')
    {!! Form::open(['url'=>'/i_want_inquire/evaluate']) !!}
   <h1>{!! Form::label('服务速度：') !!}
       {!! Form::select('speed', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'))!!};</h1>
    <h1>{!! Form::label('处理效果：') !!}
        {!! Form::select('effect', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5')) !!};</h1>
   <h1>{!! Form::label('服务态度：') !!}
       {!! Form::select('attitude', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'))!!};</h1>
    {!! Form::submit('确认提交 ',['class'=>'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
@stop