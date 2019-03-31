@extends('htmlmodel')
@section('content')
    <h1 align="center">目前状态：{!! $engineer->state !!}</h1>
    <hr>
    <h1 align="center">今日在岗时间：{!! date('H:i:s',$engineer->workhour) !!}</h1>
    <hr>
    <h1 align="center">今日出勤次数：{!! $engineer->assignment_done !!}</h1>
    <button onclick="javascript:window.location.href='/e_change_state'"
            type="submit"  style="width:1500px;height:30px;" class="btn btn-primary">变更状态</button>
@stop