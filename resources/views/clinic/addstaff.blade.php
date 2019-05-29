@extends('layouts.clinic')
<body class="login-page authentication"  style="background-image: url('/img/bg-1.jpg')">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span><font face="微軟正黑體"><h2>{{Auth::user()->clinic->name}}</h2></font></span>Register<span class="msg"><font face="微軟正黑體">員工帳號註冊</font></span></h1>
        <div class="col-md-12">
            <form action="/clinic/staff" id="sign_up" class="col-xs-12" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus>
                    </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-lock"></i>
                </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required="" autofocus>
                    </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">event</i>
                </span>
                    <div class="form-line">
                        <input type="date"   name="date" id="date" placeholder="Join Date" required="" autofocus>
                        {{--<input type="text" class="datepicker form-control" placeholder="Please choose date & time...">--}}
                    </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                 <i class="material-icons">assignment_ind</i>
                </span>
                    <div class="form-group drop-custum">
                        <select class="form-control show-tick" name="position_id" id="position_id" required="" autofocus>
                            <option value="0" readonly>Position</option>
                            @foreach($positions as $position)
                                <option value="{{$position->id}}">{{$position->position}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dz-message" style="text-align: center">
                            <div class="drag-icon-cph"> <i class="material-icons col-blue">touch_app</i> </div>
                            <h3><font face="微軟正黑體">上傳員工照片</font></h3>
                        </div>
                        <div class="fallback">
                            <input name="photo" type="file" accept ="image/*" required="" autofocus />
                        </div>
                </div>
                <div class="text-center">
                    <button type="submit"  class="btn btn-raised g-bg-cyan waves-effect">
                        <i class="material-icons">create</i><font face="微軟正黑體" style="font-size: 16px">註冊</font>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>