@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3><font face="微軟正黑體">櫃台人員</font></h3>
            <small class="text-muted">Counter Staff</small><br>
        </div>

        <div class="row clearfix">
            @foreach($clinicstaff as $staff)
                    @if($staff->position_id===2)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="body">
                                    <div class="member-card verified">
                                        <div class="thumb-xl member-thumb">
                                            <img src="{{url('img/staff/'. $staff->photo)}}"class="img-thumbnail rounded-circle" alt="profile-image">
                                        </div>

                                        <div class="">
                                            <h4 class="m-b-5 m-t-20"><font face="微軟正黑體"><strong>{{$staff->name}}</strong></font></h4>
                                            <p class="text-muted"><font face="微軟正黑體">櫃台人員</font><span> </span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
             @endforeach
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3><font face="微軟正黑體">助理護士</font></h3>
            <small class="text-muted">Assistant Nurses</small><br>
        </div>

        <div class="row clearfix">
            @foreach($clinicstaff as $staff)
                @if($staff->position_id===3)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="member-card verified">
                                    <div class="thumb-xl member-thumb">
                                        <img src="{{url('img/staff/'. $staff->photo)}}"class="img-thumbnail rounded-circle" alt="profile-image">
                                    </div>

                                    <div class="">
                                        <h4 class="m-b-5 m-t-20"><font face="微軟正黑體"><strong>{{$staff->name}}</strong></font></h4>
                                        <p class="text-muted"><font face="微軟正黑體">助理護士</font><span> </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>