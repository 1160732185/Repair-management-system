@extends('htmlmodel')
@section('content')
    <script>
        function myFunction(){
            var r=confirm("是否确认开始休息？");
            if (r==true){
                javascript:window.location.href='/e_state_rest'
            }
        }
        function myFunction1(){
            var r=confirm("是否确认开始工作？");
            if (r==true){
                javascript:window.location.href='/e_state_work'
            }
        }
    </script>
    <button onclick="myFunction()" type="submit"
            style="width:1500px;height:100px;" class="btn btn-primary">开始休息</button>
    <button onclick="myFunction1()" type="submit"
            style="width:1500px;height:100px;" class="btn btn-primary">开始工作</button>
@stop