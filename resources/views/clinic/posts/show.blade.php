@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4><font face="微軟正黑體"><strong>詳細內容</strong></font></h4>
            <small class="text-muted">Clinic posts detail</small><br>
            <a href="{{ route('clinic.posts.index') }}"><button class="btn-success">返回</button></a>
        </div>
        <div class="container">
            <div class="card-top"></div>
            <div class="card">
                <div class="col-md-12">
                    <form>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-timer"></i>
                            </span>
                            <div class="form-group drop-custum">
                                <input id="clinic_id" type="hidden" class="form-control show-tick" name="clinic_id" value="{{Auth::user()->clinic->id}}" readonly>
                                <a type="text" class="form-control show-tick">{{Auth::user()->clinic->name}}</a>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <label>標題：</label>
                            </span>
                            <div class="form-group drop-custum">
                                <a name="title" class="form-control" >{{$announcement->title}}</a>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <label>內容：</label>
                            </span>
                            <div class="form-group drop-custum">
                                <a name="content" class="form-control">{{$announcement->content}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>