@extends('layout')

@section('title')
Login Page
@stop

@section('mainbody')
        <?php
            // session()->flush();
            session()->forget('key');
            session()->forget('key2');
        ?>
        <form action="logincheck" method="post" class="form-horizontal">
                <div class="form-group">

                        <label class="control-label col-sm-5">
                            Username:
                        </label>
                        <div class="col-sm-7">
                            <input type="text" name="user" placeholder="Username" required="true">
                        </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5">
                            Password:
                        </label>
                    <div class="col-sm-7">
                        <input type="password" name="pass" placeholder="Password" required="true">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <p><button class="btn btn-primary" type="submit" name="Login">LOGIN</button></p>
        </form>

@stop