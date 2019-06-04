@extends('layouts.doctor')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="header col-light-green" style="font-size:23px;">
                <font face="微軟正黑體"><strong>看診</strong></font>
            </div>
            <small class="text-muted">Doctor Diagnosis</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card bg-lime">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div style="font-size: 20px"><font face="微軟正黑體">姓名：</font></div>
                                        <label type="text" class="form-control col-light-blue" style="text-align: center;font-size: 20px"><font face="微軟正黑體"><b>{{$patient->name}}</b></font></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div style="font-size: 20px"><font face="微軟正黑體">生日：</font></div>
                                        <label type="text" class="form-control col-light-blue" style="text-align: center;font-size: 20px">{{$patient->birthday}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div style="font-size: 20px"><font face="微軟正黑體">身分證字號：</font></div>
                                        <label type="text" class="form-control col-light-blue" style="text-align: center;font-size: 20px">{{$patient->number}}</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Material Design Colors -->
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="body">
                                        <div class="button-demo js-modal-buttons">
                                            <button type="button" data-color="grey" class="btn bg-grey waves-effect" style="font-size: 18px"><font face="微軟正黑體">查看<br>就診紀錄</font></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card bg-light-green">
                                        <form action="{{ route('search.diagnosis.post',$patient->id) }}" method="POST" >
                                            {{ csrf_field() }}
                                            <div class="header bg-light-green">
                                                <font face="微軟正黑體"><h2><strong ><span style="font-size: 20px">症狀描述</span></strong><small>Symptom Description</small> </h2></font>
                                            </div>
                                            <div class="body">
                                                <textarea class="form-control" name="symptom" style="width:930px;height:200px;font-size: 20px" required autofocus></textarea>
                                            </div>
                                            <button type="submit" class="mfb-component__button--main g-bg-blue">
                                                <i class="fa fa-plus"></i>儲存<br>症狀
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <a href="{{ route('register.patient.search')}}">
                        <button type="submit" class="btn btn-raised g-bg-cyan"> <font face="微軟正黑體">返回掛號搜尋</font></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- For Material Design Colors -->
<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"><font face="微軟正黑體">就診紀錄</font></h4>
                <span aria-hidden="true" class="close" data-dismiss="modal" aria-label="Close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" width="110"><font face="微軟正黑體">看診日期</font></th>
                            <th scope="col" width="90" ><font face="微軟正黑體">看診醫生</font></th>
                            <th scope="col"><font face="微軟正黑體">症狀</font></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td><font face="微軟正黑體">{{$record->created_at}}</font></td>
                                <td><font face="微軟正黑體">{{$record->name}}</font></td>
                                <td><font face="微軟正黑體">{{$record->symptom}}</font></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"><font face="微軟正黑體">關閉</font></button>
            </div>
        </div>
    </div>
</div>
