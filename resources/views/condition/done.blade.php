@extends('htmlmodel')
@section('content')
    @foreach($repairs as $repair)
        <h2>{!! $repair->repair_id !!}{!!  $repair->statue !!}</h2>
        <button onclick="javascript:window.location.href='/information/{!! $repair->repair_id !!}'" class="btn btn-primary" {{--href="/information/{!! $repair->id !!}"--}}>详细信息</button>
    @endforeach
@stop
