@extends('layout')

@section('title')
Login Page
@stop

@section('css')
    .login-form{
        box-shadow: 0px 0px 20px 20px rgba(75,75,75,1);
        //transform: scale(0.9);
        margin-right: 30%;
        margin-left: 30%;
        padding: 5%;
        padding-left: 1%;
        padding-right: 5%;
        background: #eee;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        opacity: ;
        width: auto ;
        height: auto;
    }

    .log-btn{
        background: #0AC986;
        display: inline-block;
        margin-left: 40%;
        margin-right: 10%;
        padding-left: 10%;
        padding-right: 10%;
        font-size: 16px;
        height: 50px;
        color: #fff;
        text-decoration: none;
        border: none;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }
    body{
        background-image: url("/images/1.jpg");
    }

@stop

@section('mainbody')
        <?php
            // session()->flush();
            session()->forget('key');
            session()->forget('key2');
        ?>
        <div class="login-form">
        <form action="logincheck" method="post" class="form-horizontal">
                <div class="form-group">
                        <label class="control-label col-sm-5" for="user">
                            Username:
                        </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"  name="user" placeholder="Username" required="true">
                            <i class="fa fa-user"></i>
                        </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="pass">
                            Password:
                        </label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="pass" placeholder="Password" required="true">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <button class="btn btn-primary log-btn" type="submit" name="Login">LOGIN</button>
                </div>
        </form>
        </div>

@stop