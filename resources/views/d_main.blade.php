@extends('htmlmodel')
@section('content')
   <h1>排队中的请求：</h1>
   {!! Form::open(['url'=>'/e_confirm']) !!}
   @foreach($repairs as $repair)
       <div class="form-group">
           <h2>{!! $repair->repair_id !!} 选择工程师：

           {!! Form::select($repair->repair_id, array(
        '工作中' => $dealEngineers,

    ),null,['placeholder' => '请选择','style'=>"width=100px"]); !!}
               <button class="btn btn-primary form-control" type="button"
                       onclick="javascript:window.location.href='/information/{{$repair->repair_id}}'; ">订单详情</button>
          </h2>
       </div>
   @endforeach
   {!! Form::submit('确认分配',['class'=>'btn btn-primary form-control']) !!}
   {!! Form::close() !!}
@stop