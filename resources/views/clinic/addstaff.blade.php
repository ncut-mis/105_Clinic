@extends('layouts.clinic')
<body class="login-page authentication"  style="background-image: url('/img/bg-1.jpg')">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span><font face="微軟正黑體"><h2>{{Auth::user()->clinic->name}}</h2></font></span>Register<span class="msg"><font face="微軟正黑體">員工帳號註冊</font></span></h1>
        <div class="col-md-12">
            <form action="/clinic/staff" id="sign_up" class="col-xs-12" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-account"></i>
                </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" autofocus>
                    </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-email"></i>
                </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                    </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-lock"></i>
                </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required="">
                    </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">event</i>
                </span>
                    <div class="form-line">
                        <input type="date" class="form-control"  name="date" id="date" placeholder="Join Date" value="<?php echo date("Y-m-d",strtotime('8hours'));?>">
                    </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                 <i class="material-icons">assignment_ind</i>
                </span>
                    <div class="form-group drop-custum">
                        <select class="form-control show-tick" name="position_id" id="position_id" >
                            <option value="0" readonly>Position</option>
                            @foreach($positions as $position)
                                <option value="{{$position->id}}">{{$position->position}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit"  class="btn btn-raised g-bg-cyan waves-effect">
                        <i class="material-icons">create</i><font face="微軟正黑體">註冊</font>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>