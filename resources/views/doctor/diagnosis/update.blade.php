@extends('layouts.doctor')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><font face="微軟正黑體">看診</font></h2>
            <small class="text-muted">Patient Diagnosis</small>
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h1>看診 </h1><small>Patient Diagnosis</small>
					</div>
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div>姓名：</div>
                                        <label type="text" class="form-control">{{$patient->name}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div>生日：</div>
                                        <label type="text" class="form-control">{{$patient->birthday}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div>身分證字號：</div>
                                        <label type="text" class="form-control">{{$patient->number}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card bg-light-green">
                                <form action="{{ route('search.diagnosis.renew',$patient->id)}}" method="POST" >
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                <div class="header bg-light-green">
                                    <font face="微軟正黑體"><h2><strong ><span style="font-size: 20px">症狀描述</span></strong><small>Symptom Description</small> </h2></font>
                                </div>
                                <div class="body">
                                    <textarea class="form-control" name="symptom" style="width:930px;height:200px;">{{$diagnosis->symptom}}</textarea>
                                </div>
                                <button type="submit" class="mfb-component__button--main g-bg-blue">
                                    <i class="fa fa-plus"></i>儲存<br>症狀
                                </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-4 col-sm-6">
                            <div class="card bg-light-blue">
                                <div class="header bg-light-blue">
                                    <font face="微軟正黑體"><h2><strong>新增藥物</strong><small>Add Medicine</small></h2></font>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <form action="/patient/{{$patient->id}}/diagnosis/{{$diagnosis->id}}/prescription/store" method="POST" >
                                            {{ csrf_field() }}
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>  <th>藥名</th>
                                                <td>
                                                    <select name="medicine_id" class="form-control show-tick">
                                                        @foreach ($medicines as  $medicine)
                                                            <option value="{{$medicine->id}}">{{$medicine->medicine}}</option>
                                                        @endforeach
                                                    </select> <br>
                                                </td>
                                            </tr>
                                            <tr> <th> 服用次數</th>
                                            <td>
                                                <select name=dosage class="form-control">
                                                    <option value=></option>
                                                    <option value=每日4次>每日4次</option>
                                                    <option value=每日3次>每日3次</option>
                                                    <option value=每日2次>每日2次</option>
                                                    <option value=每日1次>每日1次</option>
                                                </select> <br>
                                            </td>
                                            </tr>
                                               <tr>
                                                <th>服用時間</th>
                                                <td>
                                                <select name=note class="form-control">
                                                    <option value=></option>
                                                    <option value=飯前服用>飯前服用</option>
                                                    <option value=飯後服用>飯後服用</option>
                                                    <option value=睡前服用>睡前服用</option>
                                                </select> <br></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-raised g-bg-green">新增</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4 col-sm-6">
                            <div class="card bg-red">
                                <div class="header bg-red">
                                    <font face="微軟正黑體"><h2><strong>目前藥物</strong><small>Medicine</small></h2></font>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>藥物名稱</th>
                                                <th>備註</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                      @foreach ($medicines as  $medicine)
                                          @foreach ($prescriptions as  $prescription)
                                              @if ($medicine->id === $prescription->medicine_id)
                                            <tr>
                                                <td>{{$medicine->medicine}}</td>
                                                <td>{{$prescription->dosage}}</td>
                                                <td>{{$prescription->note}}</td>
                                                <td>
                                                    <form action="/patient/{{$patient->id}}/prescription/{{$prescription->id}}/destroy" method="POST" >
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-raised g-bg-green">刪除藥物</button>
                                                    </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                          @endforeach
                                        @endforeach
                                            </tbody>
                                        </table>
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
		</div>
    </div>
</section>

