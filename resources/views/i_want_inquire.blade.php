@extends('htmlmodel')
@section('content')
    <script src="/js/ajaxindex.js"></script>

    <button  id="ing" style="height:50px; width:500px;" class="btn btn-primary"> 处理中 </button>
    <button  id="evaluate" style="height:50px; width:500px;" class="btn btn-primary"> 待评价 </button>
    <button  id="done" style="height:50px; width:500px;" class="btn btn-primary"> 已完成 </button>
    <div id="result"></div>
    <script>  $(document).ready(function () {
            $.get('/i_want_inquire/ing',function(data){
                result.innerHTML=data;
            })
        });</script>
@stop