@extends('layouts.doctor')

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2><font face="微軟正黑體">首頁</font></h2>
            <small class="text-muted">Welcome to clinic</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-blue"></i> </div>
                    <div class="content">
                        <div class="text"><font face="微軟正黑體"><h4>目前看診號碼</h4></font></div>
                        <div class="number">{{$current_section->current_no}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
                    <div class="content">
                        <div class="text"><font face="微軟正黑體"><h4>目前等候人數</h4></font></div>
                        <div class="number">{{count($waiting_list)}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-yellow"></i> </div>
                    <div class="content">
                        <div class="text"><font face="微軟正黑體"><h4>目前看診時段預約人數</h4></font></div>
                        <div class="number">{{$number_of_reservations}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-blush"></i> </div>
                    <div class="content">
                        <div class="text"><font face="微軟正黑體"><h4>過號人數</h4></font></div>
                        <div class="number">{{count($late_list)}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card bg-light-green">
                    <div class="header bg-light-green">
                        <font face="微軟正黑體"><h2><strong ><span style="font-size: 20px">下一位病患</span></strong><small>Next Patient</small> </h2></font>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="font-size: 20px">候診號碼</th>
                                    <th style="font-size: 20px">姓名</th>
                                    <th style="font-size: 20px">症狀</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="vertical-align:middle;font-size: 20px">{{$next->number}}</td>
                                    @foreach($patients as $patient)
                                      @if($patient->id===$next->id)
                                            <td style="vertical-align:middle;font-size: 20px"><font face="微軟正黑體">{{$patient->name}}</font></td>

                                            <td style="vertical-align:middle"><span class="label label-danger" style="font-size: 16px"><font face="微軟正黑體">{{$next->note}}</font></span> </td>
                                  <ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
                                    <li class="mfb-component__wrap">
                                        <td>
                                        <a href="{{ route('doctor.diagnosis',$patient)}}" class="mfb-component__button--main g-bg-soundcloud">
                                            <i class="mfb-component__main-icon--resting zmdi zmdi-plus"><font face="微軟正黑體">看診</font></i>
                                        </a>
                                        </td>
                                    </li>
                                    </ul>
                                        @endif
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="card bg-light-blue">
                    <div class="header bg-light-blue">
                        <font face="微軟正黑體"><h2><strong>掛號名單</strong><small>Register List</small></h2></font>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>候診號碼</th>
                                    <th>姓名</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($waiting_list as $waiting)
                                    @foreach($patients as $patient)
                                        @if($patient->id===$waiting->member_id)
                                      <tr>
                                         <td>{{$waiting->number}}</td>
                                          <td><font face="微軟正黑體">{{ $patient->name}}</font></td>
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

            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="card bg-red">
                    <div class="header bg-red">
                        <font face="微軟正黑體"><h2><strong>過號名單</strong><small>Late List</small></h2></font>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>候診號碼</th>
                                    <th>姓名</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($late_list as $late)
                                    @foreach($patients as $patient)
                                        @if($patient->id === $late->member_id)
                                          <tr>
                                                <td>{{$late->number}}</td>
                                              <td><font face="微軟正黑體">{{$patient->name}}</font></td>
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
</section>