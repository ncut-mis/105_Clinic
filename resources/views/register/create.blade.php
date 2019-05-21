@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Reister Create</h2>

        </div>
        <div class="container">
            <div class="card-top"></div>
            <div class="card">
                <div class="col-md-12">
                    <form action="/register" id="register" class="col-xs-12" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-timer"></i>
                            </span>
                            <div class="form-group drop-custum">
                                <select class="form-control show-tick" name="section_id" id="section_id" >
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->start}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account"></i>
                            </span>
                            <div class="form-group drop-custum">
                                <select class="form-control show-tick" name="member_id" id="member_id" >
                                    @foreach($members as $member)
                                        <option value="{{$member->id}}">{{$member->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-confirmation-number"></i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="number" id="number"  value="{{$registers->Max()->number+1}}" readonly>
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

                        <div class="text-center">
                            <button type="submit"  class="btn btn-raised g-bg-cyan waves-effect">
                                <i class="material-icons">create</i><font face="微軟正黑體">掛號</font>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>