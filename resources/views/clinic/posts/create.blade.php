@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h4><font face="微軟正黑體"><strong>新增公告</strong></font></h4>
            <small class="text-muted">Clinic posts create</small><br>
        </div>

        <div class="container">
            <div class="card-top"></div>
            <div class="card">
                <div class="col-md-12">
                        <form action={{route('clinic.posts.store')}} id="post" class="col-xs-12" method="POST" class="form-horizontal" name="post">
                            {{ csrf_field() }}
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
                                    <input name="title" class="form-control" placeholder="請輸入文章標題">
                                </div>
                            </div>

                            <div class="input-group">
                            <span class="input-group-addon">
                                <label>內容：</label>
                            </span>
                                <div class="form-group drop-custum">
                                    <textarea name="content" class="form-control" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit"  class="btn btn-raised g-bg-cyan waves-effect">
                                    <i class="material-icons">create</i><font face="微軟正黑體">新增</font>
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>