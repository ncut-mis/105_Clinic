@extends('layouts.clinic')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>櫃台人員</h2>
        </div>

        <div class="row clearfix">
            @foreach($clinicstaff as $staff)
                    @if($staff->position_id===2)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="body">
                                    <div class="member-card verified">
                                        <div class="thumb-xl member-thumb">
                                            <img src="/img/random-avatar3.jpg" class="img-thumbnail rounded-circle" alt="profile-image">
                                        </div>

                                        <div class="">
                                            <h4 class="m-b-5 m-t-20"><font face="微軟正黑體"><strong>{{$staff->name}}</strong></font></h4>
                                            <p class="text-muted"><font face="微軟正黑體">櫃台人員</font><span> </span></p>
                                        </div>

                                        <ul class="social-links list-inline m-t-10">
                                            <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                            <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                            <li><a title="instagram" href="3" ><i class="zmdi zmdi-instagram"></i></a></li>
                                        </ul>
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
            <h2>助理護士</h2>
        </div>

        <div class="row clearfix">
            @foreach($clinicstaff as $staff)
                @if($staff->position_id===3)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="member-card verified">
                                    <div class="thumb-xl member-thumb">
                                        <img src="/img/random-avatar3.jpg" class="img-thumbnail rounded-circle" alt="profile-image">
                                    </div>

                                    <div class="">
                                        <h4 class="m-b-5 m-t-20"><font face="微軟正黑體"><strong>{{$staff->name}}</strong></font></h4>
                                        <p class="text-muted"><font face="微軟正黑體">助理護士</font><span> </span></p>
                                    </div>

                                    <ul class="social-links list-inline m-t-10">
                                        <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a title="instagram" href="3" ><i class="zmdi zmdi-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>