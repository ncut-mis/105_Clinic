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
                            {{--<div class="col-sm-3 col-xs-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="form-line">--}}
                                        {{--<div style="font-size: 20px">就診紀錄</div>--}}
                                        {{--<label type="text" class="form-control col-light-blue" style="text-align: center;font-size: 20px"></label>--}}
                                        {{--<div class="button-demo js-modal-buttons">--}}
                                            {{--<button type="button" data-color="red" class="btn bg-red waves-effect">查看就診紀錄</button>--}}
                                        {{--</div>--}}
                                        {{--<div class="modal fade" id="mdModal" tabindex="-1" role="dialog">--}}
                                            {{--<div class="modal-dialog" role="document">--}}
                                                {{--<div class="modal-content">--}}
                                                    {{--<div class="modal-header">--}}
                                                        {{--<h4 class="modal-title" id="defaultModalLabel">Modal title</h4>--}}
                                                        {{--<span aria-hidden="true">&times;</span>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="modal-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan--}}
                                                        {{--vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.--}}
                                                        {{--Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus--}}
                                                        {{--nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.--}}
                                                        {{--Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc. </div>--}}
                                                    {{--<div class="modal-footer">--}}
                                                        {{--<button type="button" class="btn btn-link waves-effect" >SAVE CHANGES</button>--}}
                                                        {{--<button type="button" class="btn btn-link waves-effect" data-close="modal">CLOSE</button>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card bg-light-green">
                                <form action="/patient/{{$patient->id}}/symptom/store" method="POST" >
                                    {{ csrf_field() }}
                                <div class="header bg-light-green">
                                    <font face="微軟正黑體"><h2><strong ><span style="font-size: 20px">症狀描述</span></strong><small>Symptom Description</small> </h2></font>
                                </div>
                                <div class="body">
                                    <textarea class="form-control" name="symptom" style="width:930px;height:200px;"></textarea>
                                </div>
                                <button type="submit" class="mfb-component__button--main g-bg-blue">
                                    <i class="fa fa-plus"></i>儲存<br>症狀
                                </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($next===null)
                    <div class="col-sm-12">
                        <a href="{{ route('doctor.home')}}">
                            <button type="submit" class="btn btn-raised g-bg-cyan"> <font face="微軟正黑體">下一位病患</font></button>
                        </a>
                    </div>
                    @else
                        <div class="col-sm-12">
                                <a href="{{ route('doctor.diagnosis',$next->member_id)}}">
                                    <button type="submit" class="btn btn-raised g-bg-cyan"> <font face="微軟正黑體">下一位病患</font></button>
                                </a>
                        </div>
                    @endif
                    </div>
				</div>
			</div>
		</div>
    </div>
</section>

