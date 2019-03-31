@extends('htmlmodel')
@section('content')
    <button onclick="javascript:window.location.href='/i_want_repair'" type="submit"  style="width:1500px;height:100px;" class="btn btn-primary">
        我要报修
    </button>
    <br><br><br><br><br><br>
    <button onclick="javascript:window.location.href='/i_want_inquire'" type="submit"  style="width:1500px;height:100px;" class="btn btn-primary">
        报修查询
    </button>
    <h1 style="text-align:center">最近报修</h1>
    @foreach($repairs as $repair)
单号：{!! $repair->repair_id !!}
        <br>
报修时间：{!! $repair->created_at !!}
<br><br><br>
    @endforeach
@stop