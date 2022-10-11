<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Website Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/admin-theme/assets/images/favicon.ico') }}">

    <!-- Dropzone -->
    <link href="{{asset('/admin-theme/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('/admin-theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin-theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('/admin-theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{asset('/admin-theme/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet"
        type="text/css" />

    <!-- Toast -->
    <link href="{{asset('/admin-theme/assets/libs/jquery-toast-plugin\dist\jquery.toast.min.css')}}" rel="stylesheet"
        type="text/css" />


    <!-- Bootstrap Css -->
    <link href="{{asset('/admin-theme/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/admin-theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/admin-theme/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{asset('/admin-theme/assets/css/main.css')}}" id="app-style" rel="stylesheet" type="text/css" />


    @yield("mystyles")
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/admin" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="/admin-theme/assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="/admin-theme/assets/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="/admin" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="/admin-theme/assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="/admin-theme/assets/images/logo.png" alt="" height="50">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <button type="button" class="btn header-item waves-effect font-size-18">
                        Admin Dashboard
                    </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-lg-inline-block ml-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="/admin-theme/assets/images/logo-sm.png"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('admin.changepassword') }}"><i
                                    class="bx bx-key font-size-16 align-middle mr-1"></i> Change Password</a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form-top').submit();">
                                <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout

                                <form id="logout-form-top" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li class="">
                            <a href="/admin" class="waves-effect active">
                                <i class="bx bx-home-circle"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-store"></i>
                                <span>Courses</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.pdtcategories.index') }}">Categories</a></li>
                                {{-- <li><a href="{{ route('admin.pdtsubcategories.index') }}">Sub Categories</a></li> --}}
                                <li><a href="{{ route('admin.tutors.index') }}">Tutor</a></li>
                                <li><a href="{{ route('admin.products.index') }}">Courses</a></li>
                                <li><a href="{{ route('admin.topics.index') }}">Topics</a></li>
                                <li><a href="{{ route('admin.resources.index') }}">Resource</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-task"></i>
                                <span>Features</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.sercategories.index') }}">Categories</a></li>
                                {{-- <li><a href="{{ route('admin.sersubcategories.index') }}">Sub Categories</a></li> --}}
                                <li><a href="{{ route('admin.services.index') }}">Features</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-briefcase-alt-2"></i>
                                <span>Review</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.pjxcategories.index') }}">Categories</a></li>
                                <li><a href="{{ route('admin.projects.index') }}">Review</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-file"></i>
                                <span>Blogs</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.blgcategories.index') }}">Categories</a></li>
                                <li><a href="{{ route('admin.blogs.index') }}">Blogs</a></li>
                            </ul>
                        </li>

                         <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-image-alt"></i>
                                <span>Gallery</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.glycategories.index') }}">Categories</a></li>
                                <li><a href="{{ route('admin.gallerys.index') }}">Images</a></li>
                            </ul>
                        </li> 
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-detail"></i>
                                <span>Question Papers</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.questionpapers.index') }}">Question Papers</a></li>
                                <li><a href="{{ route('admin.questionPapersUsers') }}">Question Papers Users List</a></li>
                            </ul>
                        </li> 
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-image-alt"></i>
                                <span>Results</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.results.index') }}">Result List</a></li>
                                {{-- <li><a href="{{ route('admin.gallerys.index') }}">Question Papers Users List</a></li> --}}
                            </ul>
                        </li> 
                        <li>
                            <a href="{{ route('admin.sliders.index') }}" class="waves-effect">
                                <i class="bx bx-image"></i>
                                <span>Home Page Slider</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.homePageContent',1) }}" class="waves-effect">
                                <i class="bx bx-star"></i>
                                <span>Home Page Content</span>
                            </a>
                        </li>
                        
                        {{-- <li>
                            <a href="{{ route('admin.tutors.index') }}" class="waves-effect">
                                <i class="bx bx-star"></i>
                                <span>Tutor</span>
                            </a>
                        </li>  --}}

                        <li>
                            <a href="{{ route('admin.faqs.index') }}" class="waves-effect">
                                <i class="bx bx-question-mark"></i>
                                <span>FAQ</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.news.index') }}" class="waves-effect">
                                <i class="bx bx-news"></i>
                                <span>News</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.usefullinks.index') }}" class="waves-effect">
                                <i class="bx bx-link"></i>
                                <span>Useful Links</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.contacts.index') }}" class="waves-effect">
                                <i class=" bx bxs-contact"></i>
                                <span>Contacts</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.feedbacks.index') }}" class="waves-effect">
                                <i class="bx bx-envelope"></i>
                                <span>Feedbacks</span>
                            </a>
                        </li>
                        
                        @can('manage-general')
                        <li>
                            <a href="{{ route('admin.general.edit',1) }}" class="waves-effect">
                                <i class="bx bx-globe"></i>
                                <span>General Options</span>
                            </a>
                        </li>
                        @endcan

                        @can('manage-general')
                        {{-- <li>
                            <a href="{{ route('admin.privacypolicy.edit',1) }}" class="waves-effect">
                                <i class="bx bx-check-shield"></i>
                                <span>Privacy Policy</span>
                            </a>
                        </li> --}}
                        @endcan

                        @can('manage-general')
                        {{-- <li>
                            <a href="{{ route('admin.terms.edit',1) }}" class="waves-effect">
                                <i class="bx bx-book"></i>
                                <span>Terms and Conditions</span>
                            </a>
                        </li> --}}
                        @endcan

                        @can('manage-users')
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="waves-effect">
                                <i class="bx bx-user-plus"></i>
                                <span>Manage Users</span>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="bx bx-user"></i>
                                <span>Logout</span>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start main Content here -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">@yield("pagetitle")</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        @yield("pagebc")
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield("pagecontent")

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            Version: {{ config('app.version') }}
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Developed by <a href="http://www.reontel.com" target="_blank">Reon
                                    Technologies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <!-- JAVASCRIPT -->
    <script src="{{asset('/admin-theme/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admin-theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/admin-theme/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/admin-theme/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('/admin-theme/assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- Dropzone -->
    <script src="{{asset('/admin-theme/assets/libs/dropzone/min/dropzone.min.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{asset('/admin-theme/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin-theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    <!-- apexcharts -->
    {{-- <script src="{{asset('/admin-theme/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/admin-theme/assets/js/pages/dashboard.init.js')}}"></script> --}}

    <!-- Datatable init js -->
    {{-- <script src="{{asset('/admin-theme/assets/js/pages/datatables.init.js')}}"></script> --}}

    <!-- Sweet Alerts js -->
    <script src="{{asset('/admin-theme/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{asset('/admin-theme/assets/js/pages/sweet-alerts.init.js')}}"></script>

    <!-- Toast Alert-->
    <script src="{{asset('/admin-theme/assets/libs/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

    <!--tinymce js-->
    <script src="{{asset('/admin-theme/assets/libs/tinymce/tinymce.min.js')}}"></script>

    <script src="{{asset('/admin-theme/assets/js/app.js')}}"></script>
    <script src="{{asset('/admin-theme/assets/js/common.js')}}"></script>


    @yield("footerscript")

</body>


</html>
