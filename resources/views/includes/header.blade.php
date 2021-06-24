<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('pageTitle') - File</title>
    <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Verdana:400,500,600,700","Noto+Sans:400,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">
<!-- Stylesheet -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-select/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendors/css/base/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/data-table/css/dataTables.bootstrap.min.css')}}""/>
<link rel="stylesheet" href="{{ asset('assets/vendors/css/base/elisyam-1.5.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-select/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/animate/animate.min.css') }}">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 

@stack('styles')



        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body  style="height: 100%; color:red !important;" id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">         
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="db-default.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="{{ asset('assets/img/logo-big.png') }}" alt="logo" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">


                         <li class="nav-item dropdown">
                            <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="ti-bell animated infinite swing"></i><span class="badge-pulse"></span></a>

                            <ul aria-labelledby="notifications" class="dropdown-menu notification">
                                <li>
                                    <a href="#">
                                        <div class="message-icon cartlink">
                                            <i class=""></i>
                                        </div>
                                        <div class="message-body cartlink">
                                            <div id="totalDiv" class="message-body-heading cartlink">
                                                Notifications
                                            </div>

                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- User -->
                        <li class="nav-item dropdown">
                            <a id="userimage" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">

                                <?php if(is_null(Helper::profileData()['image'])){ ?>
                                    <img src="{{ url('uploads/userimages/user.png') }}" alt="Profile pic" class="avatar rounded-circle">
                                <?php }else{ ?>
                                    <img src="{{ url('uploads/userimages/')  }}/{{Helper::profileData()['image']}}" alt="Profile pic" class="avatar rounded-circle">
                                <?php } ?>
                            </a>
                            <ul aria-labelledby="user" class="user-size dropdown-menu">
                                <li class="welcome">
                                    <?php if(is_null(Helper::profileData()['image'])){ ?>
                                        <img src="{{ url('uploads/userimages/user.png') }}" alt="Profile pic" class="rounded-circle">
                                    <?php }else{ ?>
                                        <img src="{{ url('uploads/userimages/')  }}/{{Helper::profileData()['image']}}" alt="Profile pic" class="rounded-circle">
                                    <?php } ?>
                                </li>

                                <li>
                                    <a href="{{ url('/myprofile') }}" class="dropdown-item"> 
                                        My profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}" class="dropdown-item"> 
                                        Logout
                                    </a><br>
                                </li>

                            </ul>
                        </li>
                        <!-- End User -->

                    </ul>
                    <!-- End Navbar Menu -->
                </div>
                <!-- End Topbar -->
            </nav>
        </header>
        <!-- End Header -->
        <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">
            <div class="default-sidebar">
                <!-- Begin Side Navbar -->
                <nav class="side-navbar box-scroll sidebar-scroll">
                    <!-- Begin Main Navigation -->


                    <ul class="list-unstyled">
                        <li><a href="{{ url('/dashboard') }}"><i class="la la-bar-chart"></i><span>Dashboard</span></a></li>

                        <li><a href="#user" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>User</span></a>
                            <ul id="user" class="collapse list-unstyled pt-0">
                                
								@php
                                    $id = session()->get('id');
                                    $user = App\User::findorfail($id);

                                    $role = $user->role;
                                @endphp

                                @if ($role == 'admin')
                                    <li><a href="{{ url('/addnewuser') }}">Add user</a></li>
                                @endif
                            </ul>
                        </li>

                        <li><a href="#member" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Member</span></a>
                            <ul id="member" class="collapse list-unstyled pt-0">
                                <li><a href="{{ route('create.member')}}">Add Member</a></li>
                                <li><a href="{{ route('index.member')}}">All Member</a></li>
                                <li><a href="{{ route('create.nomini')}}">Add Nomini</a></li>
                                <li><a href="{{ route('index.nomini')}}">All Nomini</a></li>
                            </ul>
                        </li>

                        <li><a href="#bank_account" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Bank Account</span></a>
                            <ul id="bank_account" class="collapse list-unstyled pt-0">
                                <li><a href="{{ route('create.bank')}}">Add Bank Account</a></li>
                                <li><a href="{{ route('index.bank')}}">All Bank Account</a></li>
                                <li><a href="{{ route('add-balance.bank')}}">Add Balance</a></li>
                            </ul>
                        </li>

                        <li><a href="#supplier" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Supplier / Customer</span></a>
                            <ul id="supplier" class="collapse list-unstyled pt-0">
                                <li><a href="{{route('create.supplier')}}">Add Supplier / Customer</a></li>
                                <li><a href="{{route('index.supplier')}}">All Supplier / Customer</a></li>
                            </ul>
                        </li>

                        <li><a href="#transaction" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Transaction</span></a>
                            <ul id="transaction" class="collapse list-unstyled pt-0">
                                <li><a href="{{route('allpayment.transaction')}}">Payment</a></li>
                                <li><a href="{{route('allreceived.transaction')}}">Received</a></li>
                            </ul>
                        </li>

                        <li><a href="#phonebook" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Phone Book</span></a>
                            <ul id="phonebook" class="collapse list-unstyled pt-0">
                                <li><a href="{{route('create.phonebook')}}">Add PhoneBook</a></li>
                                <li><a href="{{route('index.phonebook')}}">All PhoneBook</a></li>
                            </ul>
                        </li>

                        <li><a href="#sendsms" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Send Sms</span></a>
                            <ul id="sendsms" class="collapse list-unstyled pt-0">
                                <li><a href="{{route('create.allmessage')}}">Send SMS</a></li>
                                <li><a href="{{route('index.allmessage')}}">SMS History</a></li>
                            </ul>
                        </li>

                        <li><a href="#product" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Product</span></a>
                            <ul id="product" class="collapse list-unstyled pt-0">
                                <li><a href="{{ route('create.product')}}">Add Product</a></li>
                                <li><a href="{{ route('index.product')}}">All Product</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- End Side Navbar -->
            </div>

            <div class="content-inner">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- End Container -->
            <!-- Begin Page Footer-->
            <footer class="main-footer fixed-footer">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                        <p class="text-gradient-02"></p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                        <ul style="display: none;" class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="documentation.html">Documentation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="changelog.html">Changelog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
            <!-- End Page Footer -->
            <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>

        </div>
        <!-- End Content -->
    </div>
    <!-- End Page Content -->
</div>



@stack('scripts')

<!-- End Left Sidebar -->

<!-- Begin Vendor Js -->

<script src="{{asset('assets/vendors/js/base/jquery.min.js')}}"></script>

<script src="{{ asset('assets/vendors/js/base/core.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/vendors/data-table/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/data-table/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="{{ asset('assets/vendors/js/nicescroll/nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/app/app.min.js') }}"></script>
<!-- End Page Vendor Js -->

<!-- Notification Js -->
<script src="{{ asset('assets/vendors/js/noty/noty.min.js') }}"></script>
<script src="{{ asset('assets/js/components/notifications/notifications.min.js') }}"></script>
<script src="{{ asset('assets/commonscript.js') }}"></script>

<!-- Tosster Js -->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}







</body>
</html>