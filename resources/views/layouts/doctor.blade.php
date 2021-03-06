﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{Auth::user()->clinic->name}} | 管理後台</title>
    <link rel="icon" href="/img/clinic.png" type="image/x-icon">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Custom Css --><!-- home -->
    <link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet" />
    <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"><!-- addstaff -->
    <!-- Dropzone Css -->
    <link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
    <!-- Wait Me Css -->
    <link href="{{ asset('plugins/waitme/waitMe.css') }}" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- #Float icon -->

<!-- #Float icon -->
<!-- Morphing Search  -->
<div id="morphsearch" class="morphsearch">
    <form class="morphsearch-form">
        <div class="form-group m-0">
            <input value="" type="search" placeholder="" class="form-control morphsearch-input" />
            <button class="morphsearch-submit" type="submit">Search</button>
        </div>
    </form>
    <div class="morphsearch-content">
    </div>
    <!-- /morphsearch-content -->
    <span class="morphsearch-close"></span> </div>
<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html"><font face="微軟正黑體">{{Auth::user()->clinic->name}}</font></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i></a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>
            <!-- #END# Notifications -->
            <!-- Tasks -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i> </a>
                <ul class="dropdown-menu">
                    <li class="header">TASKS</li>
                    <li class="body">
                        <ul class="menu tasks">

                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Tasks</a> </li>
                </ul>
            </li>
            <!-- #END# Tasks -->
            <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
        </ul>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="{{url('img/staff/'. auth()->user()->photo)}}"> </div>
            <div class="admin-action-info"> <span>Welcome</span>
                <h3><font face="微軟正黑體">{{Auth::user()->name}} <small>醫生</small></font></h3>
                <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li>
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                    <li><a data-placement="bottom" title="登出" href="/home" ><i class="zmdi zmdi-sign-in"></i></a></li>
                </ul>
            </div>
            <div class="quick-stats">
                <h5><font face="微軟正黑體" style="color:#ffffff">今日門診<br><?php echo date("Y年m月d日");?></font></h5>
                <ul>
                    {{--<li><span>1<i><font face="微軟正黑體"><strong>目前號碼</strong></font></i></span></li>--}}
                    {{--<li><span>20<i><font face="微軟正黑體"><strong>剩餘人數</strong></font></i></span></li>--}}
                    {{--<li><span>04<i><font face="微軟正黑體"><strong>剩餘門診數</strong></font></i></span></li>--}}
                    <li><font face="微軟正黑體" style="color:#ffffff">醫師看診中</font></li>
                </ul>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li><a href="{{ route('doctor.home') }}"><i class="zmdi zmdi-home col-red"></i><span><font face="微軟正黑體"><strong>首頁</strong></font></span></a></li>
                <li><a href="{{ route('doctor.diagnosis.continue',$patient) }}"><i class="zmdi zmdi-calendar-check col-blue"></i><span><font face="微軟正黑體"><strong>看診</strong></font></span></a></li>
                <li><a href="{{ route('register.patient.search') }}"><i class="zmdi zmdi-search col-amber"></i><span><font face="微軟正黑體"><strong>掛號搜尋</strong></font></span></a></li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red">
                        <div class="red"></div>
                        <span>Red</span> </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span> </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span> </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span> </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span> </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span> </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span> </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span> </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span> </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>


<div class="color-bg"></div>
<!-- Jquery Core Js -->
<script src="{{ asset('bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('bundles/morphingsearchscripts.bundle.js') }}"></script> <!-- morphing search Js -->
<script src="{{ asset('bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{ asset('bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
<script src="{{ asset('bundles/morphingscripts.bundle.js') }}"></script><!-- morphing search page js -->
<!-- home -->
<script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('plugins/chartjs/Chart.bundle.min.js') }}"></script> <!-- Chart Plugins Js -->
<script src="{{ asset('js/pages/index.js') }}"></script>
<script src="{{ asset('js/pages/charts/sparkline.min.js') }}"></script>
<!-- addstaff -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script> <!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script> <!-- Moment Plugin Js -->
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script> <!-- Dropzone Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('js/pages/forms/basic-form-elements.js') }}"></script>
<script src="{{ asset('js/pages/ui/modals.js') }}"></script><!-- Modal -->
<script src="{{ asset('js/pages/ui/dialogs.js') }}/"></script><!-- dialog-->
<script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('bundles/datatablescripts.bundle.js') }}"></script><!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('js/morphing.js') }}"></script><!-- Custom Js -->
<script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
</body>
</html>