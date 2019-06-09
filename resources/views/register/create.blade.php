@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3><font face="微軟正黑體">掛號</font></h3>
            <small class="text-muted">Register</small>
        </div>
        <div class="container">
            <div class="card-top"></div>
            <div class="card">
                <div class="col-md-12">
                    @foreach($sections as $section)
                    <form action={{route('register.store',$section)}} id="register" class="col-xs-12" method="POST" class="form-horizontal" name="register">
                        {{ csrf_field() }}
                        <div style="text-align:center"><h5><font face="微軟正黑體">{{$section->name}}醫生</font></h5></div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-timer"></i>
                            </span>
                            <div class="form-group drop-custum">
                                <select class="form-control show-tick" name="section_id" id="section_id">
                                        <option value="{{$section->id}}">{{$section->start}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account"></i>
                            </span>
                            <div class="form-group drop-custum">
                                @foreach($members as $member)
                                <input id="member_id" type="hidden" class="form-control show-tick" name="member_id" value="{{$member->id}}"readonly>
                                <a type="text" class="form-control show-tick">{{$member->name}}</a>
                                @endforeach
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit"  class="btn btn-raised g-bg-cyan waves-effect">
                                <i class="material-icons">create</i><font face="微軟正黑體">掛號</font>
                            </button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>