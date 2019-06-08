@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3><font face="微軟正黑體">醫生人員</font></h3>
            <small class="text-muted">The Doctors</small><br>
        </div>
        <div class="row clearfix">
       @foreach($doctors as $doctor)
       @foreach($staffs as $staff)
           @if($doctor->staff_id===$staff->id)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="member-card verified">
                            <div class="thumb-xl member-thumb">
                                <img src="{{url('img/staff/'. $staff->photo)}}"class="img-thumbnail rounded-circle" alt="profile-image">
                            </div>

                            <div class="">
                                <h4 class="m-b-5 m-t-20"><font face="微軟正黑體"><strong>{{$staff->name}}</strong></font></h4>
                                <p class="text-muted"><font face="微軟正黑體">醫師</font><span> </span></p>
                            </div>

                            <p class="text-muted"><font face="微軟正黑體">駐診日期</font><br>{{$doctor->clinic_date}}</p>
                            <a href="{{ route('clinic.profile',$doctor) }}" class="btn btn-raised btn-sm bg-blue"><font face="微軟正黑體">醫生簡介</font></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
           @endforeach
          @endforeach
        </div>
    </div>
</section>