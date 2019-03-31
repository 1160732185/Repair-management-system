@extends('layouts.app')
<style>
    .error {color: #FF0000;}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        {{--<div class="form-group{{ $errors->has('worknumber') ? ' has-error' : '' }}">--}}
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">工号</label>
                            <span>
                                <font size="3" color="red">
                                     @if (isset($_GET['numerr'])) 不存在此工号！ @endif
                                </font>
                            </span>
                            <div class="col-md-6">
                                <input id="worknumber" class="form-control" name="worknumber" value="{{ old('worknumber') }}" required autofocus>

                                @if ($errors->has('worknumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('worknumber') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group">
                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            <label for="password" class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <font size="3" color="red">
                                    @if (isset($_GET['passworderr']))密码错误！ @endif
                                </font>
                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
