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
                            <div class="mt-10">
                                <button class="btn btn-raised btn-default bg-blush btn-sm">Follow</button>
                                <button class="btn btn-raised btn-default bg-green btn-sm">Message</button>
                            </div>
                            <p class="social-icon">
                                <a title="Twitter" href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Facebook" href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a title="Google-plus" href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Dribbble" href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                <a title="Behance" href="#"><i class="zmdi zmdi-behance"></i></a>
                                <a title="Instagram" href="#"><i class="zmdi zmdi-instagram "></i></a>
                                <a title="Pinterest" href="#"><i class="zmdi zmdi-pinterest "></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="profile-sub-header">
                        <div class="box-list">
                            <ul class="text-center">
                                <li> <a href="mail-inbox.html" class=""><i class="zmdi zmdi-email"></i>
                                    <p>My Inbox</p>
                                    </a> </li>
                                <li> <a href="#" class=""><i class="zmdi zmdi-camera"></i>
                                    <p>Gallery</p>
                                    </a> </li>
                                <li> <a href="#"><i class="zmdi zmdi-attachment"></i>
                                    <p>Collections</p>
                                    </a> </li>
                                <li> <a href="#"><i class="zmdi zmdi-format-subject"></i>
                                    <p>Tasks</p>
                                    </a> </li>
                            </ul>
                        </div>
                    </div>
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
                <div class="card">
                    <div class="header">
                        <h2>My Portfolio Status</h2>
                    </div>
                    <div class="body">
                        <ul class="list-unstyled">
                            <li>
                                <div>Behance</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Themeforest</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Dribbble</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                </div>
                            </li>
                            <li>
                                <div>Pinterest</div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="body"> 
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mypost">My Post</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#timeline">Activities</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usersettings">Setting</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="mypost">
                                <div class="wrap-reset">
                                    <div class="mypost-form">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                        <div class="post-toolbar-b"> <a href="#" tooltip="Add File" class="btn btn-raised btn-default btn-sm"><i class="zmdi zmdi-attachment"></i></a> <a href="#" tooltip="Add Image" class="btn btn-raised btn-default btn-sm"><i class="zmdi zmdi-camera"></i></a> <a href="#" class="pull-right btn btn-raised btn-success btn-sm" tooltip="Post it!">Post</a> </div>
                                    </div>
                                    <div class="mypost-list">
                                        <div class="post-box"> <span class="text-muted text-small"><i class="zmdi zmdi-alarm"></i> 3 minutes ago</span>
                                            <div class="post-img"><img src="/img/puppy-1.jpg" class="img-fluid" alt /></div>
                                            <div>
                                                <h4 class=""><font face="微軟正黑體">專長 specialties</font></h4>
                                                <p class="mb-0"><font face="微軟正黑體">{{$doctor->specialties}}</font></p>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="post-box"> <span class="text-muted text-small"><i class="zmdi zmdi-alarm"></i> 23 minutes ago</span>
                                            <div class="post-img"><img src="/img/puppy-2.jpg" class="img-fluid" alt /></div>
                                            <div>
                                                <h4 class=""><font face="微軟正黑體">經歷 experiences</font></h4>
                                                <p class="mb-0"><font face="微軟正黑體">{{$doctor->experiences}}</font></p>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="post-box"> <span class="text-muted text-small"><i class="zmdi zmdi-alarm"></i> 45 minutes ago</span>
                                            <div class="post-img"><img src="/img/puppy-3.jpg" class="img-fluid" alt /></div>
                                            <div>
                                                <h4 class=""><font face="微軟正黑體">學歷 degrees</font></h4>
                                                <p class="mb-0"><font face="微軟正黑體">{{$doctor->degrees}}</font></p>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center"> <a href="#" class="btn btn-raised btn-default">Load More …</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border">
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small">Just now</div>
                                                <p>Finished task #features 4.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">11:30</div>
                                                <p>@Jessi retwit your post</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small">10:30</div>
                                                <p>Call to customer #Jacob and discuss the detail.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning">
                                            <div class="item-content">
                                                <div class="text-small">3 days ago</div>
                                                <p>Jessi commented your post.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text--muted">Thu, 10 Mar</div>
                                                <p>Trip to the moon</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Sat, 5 Mar</div>
                                                <p>Prepare for presentation</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-danger">
                                            <div class="item-content">
                                                <div class="text-small">Sun, 11 Feb</div>
                                                <p>Jessi assign you a task #Mockup Design.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">Thu, 17 Jan</div>
                                                <p>Follow up to close deal</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small">Just now</div>
                                                <p>Finished task #features 4.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small">11:30</div>
                                                <p>@Jessi retwit your post</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small">10:30</div>
                                                <p>Call to customer #Jacob and discuss the detail.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning">
                                            <div class="item-content">
                                                <div class="text-small">3 days ago</div>
                                                <p>Jessi commented your post.</p>
                                            </div>
                                        </div>
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