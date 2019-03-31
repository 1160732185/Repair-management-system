@extends('htmlmodel')
@section('content')
<h1>维修id：{!! $repair->repair_id !!}</h1>
    <ui>
        <li>报修人工号： {!! $repair->worknumber !!}</li>
        <li>报修人部门：{!! $repair->department !!} </li>
        <li>报修人手机： {!! $repair->phone !!}</li>
        <li>设备id：{!! $repair->equipment_id !!} </li>
        <li>设备楼层：{!! $repair->floor !!} </li>
        <li>问题描述： {!! $repair->description !!}</li>
        <li>下单时间：{!! $repair->created_at !!} </li>
        <li>报修状态： {!! $repair->statue !!}</li>
        <li>维修结果：{!!  $repair->result !!}</li>
        <?php
       /* echo $repair->engineer;*/
        if($repair->repairman_id !=null) echo '<li>维修工编号：'.$repair->repairman_id .'</li>';
        if($repair->repairman_phone !=null) echo '<li>维修工手机：' . $repair->repairman_phone .'</li>';
        if($repair->evaluate !=null) echo '<li>评分：'.$repair->evaluate .'</li>';
        if($repair->statue =='待评价'&&session('department')!='工程师'&&session('department')!='分配员')  {
            session(['repair_evaluate' => $repair->repair_id]); echo'<button  class="btn btn-primary" onclick="javascript:window.location.href=\'/evaluate\'">进行评价</button>';
        }
        ?>

            @if (isset($repair->engineer)&&$repair->statue=='已派单')
            {!! Form::open(['url'=>'/e_complete']) !!}
            {!! Form::select('result', array(
                   '彻底解决'=>'彻底解决', '变通方法解决'=>'变通方法解决',  '未完全解决'=>'未完全解决' ,'误报'=>'误报'
                ),null,['placeholder' => '请选择','style'=>"width=100px"]); !!}
            {!! Form::submit('完成任务',['class'=>'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
            @endif

       {{-- if($repair->statue =='已派单'&& $repair->repairman_id==session('worknumber'))  {
            session(['repair_complete' => $repair->repair_id]); echo '
{!! Form::open([\'url\'=>\'/e_confirm\']) !!}
 {!! Form::select(\'最终结果\', array(
        \'彻底解决\' \'变通方法解决\'  \'未完全解决\' \'误报\'
     ),null,[\'placeholder\' => \'请选择\',\'style\'=>"width=100px"]); !!}
              {!! Form::submit(\'完成任务\',[\'class\'=>\'btn btn-primary form-control\']) !!}
   {!! Form::close() !!}
';
        }--}}


        {{--<li>维修工编号： {!! $repair->repairman_id !!}</li>
        <li>维修工手机： {!! $repair->repairman_phone !!}</li>--}}
    </ui>
@stop