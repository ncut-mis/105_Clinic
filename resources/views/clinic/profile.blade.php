@extends('layouts.clinic')

<section class="content profile-page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 p-l-0 p-r-0">
                <section class="boxs-simple">
                    <div class="profile-header" style="background-image: url('/img/profile-bg.jpg')">
                        <div class="profile_info">
                            <div class="profile-image"> <img src="/img/random-avatar7.jpg" alt=""> </div>
                            <h4 class="mb-0"><strong><font face="微軟正黑體">{{$doctor->staff->name}}</font></strong></h4>
                            <span class="text-muted col-white"><font face="微軟正黑體">醫生</font></span>

                        </div>
                    </div>
                   <br>
                </section>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><font face="微軟正黑體"><strong>每週預訂看診時段</strong></font></h2>
                    </div>
                    <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" style="text-align: center">門診時間</th>
                                    <th scope="col" >星期一</th>
                                    <th scope="col">星期二</th>
                                    <th scope="col">星期三</th>
                                    <th scope="col">星期四</th>
                                    <th scope="col">星期五</th>
                                    <th scope="col">星期六</th>
                                    <th scope="col">星期日</th>
                                </tr>
                                </thead>
                                <tbody>

                            @foreach($per_week_sections as $per_week_section)
                             @if($doctor->id === $per_week_section->doctor_id)
                                 <tr>
                                    <th scope="row" style="text-align: center">{{ $per_week_section->start_time}}<br>|<br>{{ $per_week_section->end_time}}
                               @if($per_week_section->weekday === "星期一")
                                  <td><i class="material-icons" >star</i></td>
                                   @else
                                   <td></td>
                                @endif
                                @if($per_week_section->weekday === "星期二")
                                    <td><i class="material-icons" >star</i></td>
                                    @else
                                    <td></td>
                                 @endif
                                  @if($per_week_section->weekday === "星期三")
                                   <td><i class="material-icons" >star</i></td>
                                    @else
                                     <td></td>
                                  @endif
                                  @if($per_week_section->weekday === "星期四")
                                   <td><i class="material-icons" >star</i></td>
                                   @else
                                    <td></td>
                                  @endif
                                  @if($per_week_section->weekday === "星期五")
                                    <td><i class="material-icons">star</i></td>
                                   @else
                                    <td></td>
                                 @endif
                                  @if($per_week_section->weekday === "星期六")
                                     <td><i class="material-icons">star</i></td>
                                    @else
                                     <td></td>
                                  @endif
                                   @if($per_week_section->weekday === "星期日")
                                      <td><i class="material-icons" >star</i></td>
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
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mypost"><font face="微軟正黑體">醫生專長&經歷&學歷</font></a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usersettings">Setting</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="mypost">
                                <div class="wrap-reset">
                                    <div class="mypost-form">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="mypost-list">
                                        <div class="post-box"> <span class="text-muted text-small"></span>
                                            <div class="post-img"><img src="/img/puppy-1.jpg" class="img-fluid" alt /></div>
                                            <div>
                                                <h4 class=""><font face="微軟正黑體">專長 specialties</font></h4>
                                                <p class="mb-0"><font face="微軟正黑體">{{$doctor->specialties}}</font></p>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="post-box"> <span class="text-muted text-small"></span>
                                            <div class="post-img"><img src="/img/puppy-2.jpg" class="img-fluid" alt /></div>
                                            <div>
                                                <h4 class=""><font face="微軟正黑體">經歷 experiences</font></h4>
                                                <p class="mb-0"><font face="微軟正黑體">{{$doctor->experiences}}</font></p>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="post-box"> <span class="text-muted text-small"></span>
                                            <div class="post-img"><img src="/img/puppy-3.jpg" class="img-fluid" alt /></div>
                                            <div>
                                                <h4 class=""><font face="微軟正黑體">學歷 degrees</font></h4>
                                                <p class="mb-0"><font face="微軟正黑體">{{$doctor->degrees}}</font></p>

                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="usersettings">
                               <div class="body">
                                    <h2 class="card-inside-title">Security Settings</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" placeholder="Current Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" placeholder="New Password">
                                                </div>
                                            </div>
                                            <button class="btn btn-raised btn-success btn-sm">Save Changes</button>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Account Settings</h2>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize" placeholder="Address Line 1"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="E-mail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group checkbox">
                                                <label>
                                                    <input name="optionsCheckboxes" type="checkbox">
                                                    <span class="checkbox-material"><span class="check"></span></span> Profile Visibility For Everyone </label>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-raised btn-success">Save Changes</button>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>