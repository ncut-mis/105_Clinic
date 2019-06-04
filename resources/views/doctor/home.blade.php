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
                    <div class="icon"> <i class="zmdi zmdi-account col-blush"></i> </div>
                    <div class="content">
                        <div class="text"><font face="微軟正黑體"><h4>過號人數</h4></font></div>
                        <div class="number">{{count($late_list)}}</div>
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
        </div>
        @if($now!==null && $now->status===1)
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card bg-light-green">
                    <div class="header bg-light-green">
                        <font face="微軟正黑體"><h2><strong ><span style="font-size: 20px">正在看診病患</span></strong><small>Now Patient</small> </h2></font>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="font-size: 20px">候診號碼</th>
                                    <th style="font-size: 20px">姓名</th>
                                    <th style="font-size: 20px">備註</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @if($now->reservation_no == (int)$now->reservation_no)
                                    <td style="vertical-align:middle;font-size: 20px">{{$now->reservation_no}}</td>
                                    @else
                                        <th style="vertical-align:middle;font-size: 20px"><font face="微軟正黑體">過號病患</font></th>
                                    @endif
                                    @foreach($patients as $patient)
                                        @if($patient->id=== $now->member_id)
                                            <td style="vertical-align:middle;font-size: 20px"><font face="微軟正黑體">{{$patient->name}}</font></td>
                                            @if($now->note !== null)
                                            <td style="vertical-align:middle"><span class="label label-danger" style="font-size: 16px"><font face="微軟正黑體">{{$now->note}}</font></span> </td>
                                            @else
                                                <td style="vertical-align:middle"><font face="微軟正黑體"></font></td>
                                            @endif
                                            <ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
                                                <li class="mfb-component__wrap">
                                                    <td>
                                                        <a href="{{ route('doctor.diagnosis.continue',$patient)}}" class="mfb-component__button--main g-bg-soundcloud">
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
        @endif
        @if($next!==null && $next!=='finish')
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card bg-amber">
                    <div class="header bg-amber">
                        <font face="微軟正黑體"><h2><strong ><span style="font-size: 20px">下一位病患</span></strong><small>Next Patient</small> </h2></font>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="font-size: 20px">候診號碼</th>
                                    <th style="font-size: 20px">姓名</th>
                                    <th style="font-size: 20px">備註</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @if($next->reservation_no == (int)$next->reservation_no)
                                        <td style="vertical-align:middle;font-size: 20px">{{$next->reservation_no}}</td>
                                    @else
                                        <th style="vertical-align:middle;font-size: 20px"><font face="微軟正黑體">過號病患</font></th>
                                    @endif
                                    @foreach($patients as $patient)
                                      @if($patient->id===$next->member_id)
                                            <td style="vertical-align:middle;font-size: 20px"><font face="微軟正黑體">{{$patient->name}}</font></td>
                                            @if($next->note !== null)
                                            <td style="vertical-align:middle"><span class="label label-danger" style="font-size: 16px"><font face="微軟正黑體">{{$next->note}}</font></span> </td>
                                            @else
                                                <td style="vertical-align:middle"><font face="微軟正黑體"></font></td>
                                            @endif
                                            @if($now===null)
                                             <ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
                                                    <li class="mfb-component__wrap">
                                                       <td>
                                                         <a href="{{ route('doctor.diagnosis',$patient)}}" class="mfb-component__button--main g-bg-soundcloud">
                                                           <i class="mfb-component__main-icon--resting zmdi zmdi-plus"><font face="微軟正黑體">看診</font></i>
                                                         </a>
                                                       </td>
                                                    </li>
                                             </ul>
                                                @else
                                                <td></td>
                                            @endif
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
        @endif
        <div class="row clearfix">
            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="card bg-light-blue">
                    <div class="header bg-light-blue">
                        <font face="微軟正黑體"><h2><strong>等候名單</strong><small>Waiting List</small></h2></font>
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
                                          @if($waiting->reservation_no == (int)$waiting->reservation_no)
                                              <td>{{$waiting->reservation_no}}</td>
                                          @else
                                              <td><font face="微軟正黑體">過號重新再掛號病患</font></td>
                                          @endif
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
                                              @if($late->reservation_no == (int)$late->reservation_no)
                                                  <td>{{$late->reservation_no}}</td>
                                              @else
                                                  <td><font face="微軟正黑體">過號重新再掛號病患</font></td>
                                              @endif
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
    </div>
</section>
