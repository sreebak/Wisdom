<!DOCTYPE html>
<html lang="en-gb">
   
<head>
    <meta charset="utf-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    @yield('meta-data')
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/image/fav_icon/96x966.ico')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/image/fav_icon/32x32.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/image/fav_icon/16x16.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style_01.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive_style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-4.0.0-dist/css/bootstrap.min.css')}}">

    @yield('mystyles')

    @yield('google-analytics')

<style>
    

/* Please ❤ this if you like it! */


/* @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext'); */

/* #Primary
================================================== */

/* body{ 
	background-image: url('assets/svg/devops-bg.svg');
	background-position: center;
	background-repeat: repeat;
	background-size: 7%;
	background-color: #fff;
	overflow-x: hidden;
    transition: all 200ms linear;
} */
::selection {
	color: #fff;
	background-color: #00ac9a;
}
::-moz-selection {
	color: #fff;
	background-color: #00ac9a;
}


/* #Navigation
================================================== */

.start-header {
	opacity: 1;
	transform: translateY(0);
	padding: 7px 0;
	box-shadow: 0 10px 30px 0 rgba(138, 155, 165, 0.15);
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.start-header.scroll-on {
	box-shadow: 0 5px 10px 0 rgba(138, 155, 165, 0.15);
	padding: 10px 0;
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.start-header.scroll-on .navbar-brand img{
	height: 80px;
    position: absolute;
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
    background-color: white;
    padding: 5px;
    border-radius: 15px;
    top: -20%; 

}
.navigation-wrap{
	position: fixed;
	width: 100%;
	top: 0;
	left: 0;
	z-index: 1000;
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.navbar{
	padding: 0;
}
.navbar-brand img{
	height: 60px;
	width: auto;
	display: block;
  /* filter: brightness(10%); */
	-webkit-transition : all 0.3s ease-out;
	transition : all 0.3s ease-out;
}
.navbar-toggler {
	float: right;
	border: none;
	padding-right: 0;
}
.navbar-toggler:active,
.navbar-toggler:focus {
	outline: none;
}
.navbar-light .navbar-toggler-icon {
	width: 24px;
	height: 17px;
	background-image: none;
	position: relative;
	border-bottom: 1px solid #000;
    transition: all 300ms linear;
}
.navbar-light .navbar-toggler-icon:after, 
.navbar-light .navbar-toggler-icon:before{
	width: 24px;
	position: absolute;
	height: 1px;
	background-color: #000;
	top: 0;
	left: 0;
	content: '';
	z-index: 2;
    transition: all 300ms linear;
}
.navbar-light .navbar-toggler-icon:after{
	top: 8px;
}
.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:after {
	transform: rotate(45deg);
}
.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon:before {
	transform: translateY(8px) rotate(-45deg);
}
.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
	border-color: transparent;
}
.nav-link{
	color: #212121 !important;
	font-weight: 500;
    transition: all 200ms linear;
}
.nav-item:hover .nav-link{
	color: #00ac9a !important;
}
.nav-item.active .nav-link{
	color: #009383 !important;
}
.nav-link {
	position: relative;
	padding: 5px 0 !important;
	display: inline-block;
}
  /* .nav-item:after{
	position: absolute;
	bottom: -5px;
	left: 0;
	width: 100%;
	height: 2px;
	content: '';
	background-color: #00ac9a;
	opacity: 0;
    transition: all 200ms linear;
}
.nav-item:hover:after{
	bottom: 0;
	opacity: 1;
}
.nav-item.active:hover:after{
	opacity: 0;
} */
.nav-item{
	position: relative;
    transition: all 200ms linear;
}  

/* #Primary style
================================================== */

.bg-light {
	background-color: #fff !important;
    transition: all 200ms linear;
}
.section {
    position: relative;
	width: 100%;
	display: block;
}
.full-height {
    height: 100vh;
}
.over-hide {
    overflow: hidden;
}
.absolute-center {
	position: absolute;
	top: 50%;
	left: 0;
	width: 100%;
  margin-top: 40px;
	transform: translateY(-50%);
	z-index: 20;
}
  
#switch,
#circle {
	cursor: pointer;
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
} 
#switch {
	width: 60px;
	height: 8px;
	border: 2px solid #00ac9a;
	border-radius: 27px;
	background: #000;
	position: relative;
	display: block;
	margin: 0 auto;
	text-align: center;
	opacity: 1;
	transform: translate(0);
    transition: all 300ms linear;
    transition-delay: 1900ms;
}
body.hero-anime #switch{
	opacity: 0;
	transform: translateY(40px);
    transition-delay: 1900ms;
}
#circle {
	position: absolute;
	top: -11px;
	left: -13px;
	width: 26px;
	height: 26px;
	border-radius: 50%;
	background: #000;
}
.switched {
	border-color: #000 !important;
	background: #00ac9a !important;
}
.switched #circle {
	left: 43px;
	box-shadow: 0 4px 4px rgba(26,53,71,0.25), 0 0 0 1px rgba(26,53,71,0.07);
	background: #fff;
}
.nav-item .dropdown-menu {
    transform: translate3d(0, 10px, 0);
    visibility: hidden;
    opacity: 0;
	max-height: 0;
    display: block;
	padding: 0;
	margin: 0;
    transition: all 200ms linear;
}
.nav-item.show .dropdown-menu {
    opacity: 1;
    visibility: visible;
	max-height: 999px;
    transform: translate3d(0, 0px, 0);
}
.dropdown-menu {
	padding: 10px!important;
	margin: 0;
	font-size: 13px;
	letter-spacing: 1px;
	color: #212121;
	background-color: #fcfaff;
	border: none;
	border-radius: 3px;
	box-shadow: 0 5px 10px 0 rgba(138, 155, 165, 0.15);
    transition: all 200ms linear;
}
.dropdown-toggle::after {
	display: none;
}

.dropdown-item {
	padding: 3px 15px;
	color: #212121;
	border-radius: 2px;
    transition: all 200ms linear;
}
.dropdown-item:hover, 
.dropdown-item:focus {
	color: #fff;
	background-color: rgb(81 144 231);
}

body.dark{
	color: #fff;
	background-color: #1f2029;
}
body.dark .navbar-brand img{
  filter: brightness(100%);
}
body.dark h1{
	color: #fff;
}
body.dark h1 span{
    transition-delay: 0ms !important;
}
body.dark p{
	color: #fff;
    transition-delay: 0ms !important;
}
body.dark .bg-light {
	background-color: #14151a !important;
}
body.dark .start-header {
	box-shadow: 0 10px 30px 0 rgba(0, 0, 0, 0.15);
}
body.dark .start-header.scroll-on {
	box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.15);
}
body.dark .nav-link{
	color: #fff !important;
}
body.dark .nav-item.active .nav-link{
	color: #999 !important;
}
body.dark .dropdown-menu {
	color: #fff;
	background-color: #1f2029;
	box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.25);
}
body.dark .dropdown-item {
	color: #fff;
}
body.dark .navbar-light .navbar-toggler-icon {
	border-bottom: 1px solid #fff;
}
body.dark .navbar-light .navbar-toggler-icon:after, 
body.dark .navbar-light .navbar-toggler-icon:before{
	background-color: #fff;
}
body.dark .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
	border-color: transparent;
}



/* #Media
================================================== */

@media (max-width: 767px) { 
	h1{
		font-size: 38px;
	}
	.nav-item:after{
		display: none;
	}
	.nav-item::before {
		position: absolute;
		display: block;
		top: 15px;
		left: 0;
		width: 11px;
		height: 1px;
		content: "";
		border: none;
		background-color: #000;
		vertical-align: 0;
	}
	.dropdown-toggle::after {
		position: absolute;
		display: block;
		top: 10px;
		left: -23px;
		width: 1px;
		height: 11px;
		content: "";
		border: none;
		background-color: #000;
		vertical-align: 0;
		transition: all 200ms linear;
	}
	.dropdown-toggle[aria-expanded="true"]::after{
		transform: rotate(90deg);
		opacity: 0;
	}
	.dropdown-menu {
		padding: 0 !important;
		background-color: transparent;
		box-shadow: none;
		transition: all 200ms linear;
	}
	.dropdown-toggle[aria-expanded="true"] + .dropdown-menu {
		margin-top: 10px !important;
		margin-bottom: 20px !important;
	}
	body.dark .nav-item::before {
		background-color: #fff;
	}
	body.dark .dropdown-toggle::after {
		background-color: #fff;
	}
	body.dark .dropdown-menu {
		background-color: transparent;
		box-shadow: none;
	}
}

/* #Link to page
================================================== */

.logo {
	position: absolute;
	bottom: 30px;
	right: 30px;
	display: block;
	z-index: 100;
	transition: all 250ms linear;
}
.logo img {
	height: 26px;
	width: auto;
	display: block;
  filter: brightness(10%);
	transition: all 250ms linear;
}
body.dark .logo img {
  filter: brightness(100%);
}
</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-204910606-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-204910606-1');
</script>



</head>

<body>
    <!--=========header start============-->
    <style>
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 0px;
            margin-bottom: 8px;
            resize: vertical;
        }
    
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    
        input[type=submit]:hover {
            background-color: #45a049;
        }
    
        .modal-header {
            border-bottom: 0;
            padding-bottom: 0;
        }
    
        .modal-body {
            padding-top: 0;
        }
    
    </style>


 

<!-- header open  -->

<header class="hero-anime">	

	<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-xl navbar-light">
					
                    <a class="navbar-brand pb-2" href="/"> <img src="{{asset('assets/image/logo-png.png')}}" alt=""> </a>	
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
                            <li class="nav-item  pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link hover_" href="{{route('home')}}">Home</a>
								</li>
								<!-- <li class="nav-item hover_ pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="{{route('home')}}" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
									  <div class="dropdown-menu">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<a class="dropdown-item" href="#">Another action</a>
									</div>  
								</li> -->
								<li class="nav-item  pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{route('about')}}">About</a>
								</li>
								{{-- <li class="nav-item  pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{route('howitworks')}}">How it works</a>
								</li> --}}
								<li class="nav-item hover_  pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Courses</a>
									<div class="dropdown-menu">
                                    @forelse ($courses as $course)
                                    <a class="dropdown-item" href="{{route('course',$course->url_slug)}}">{{$course->product_name }}</a>
                                    @empty
                                   <a class="dropdown-item" href="javascript:void(0)">No Courses Yet</a> 
                                    @endforelse
									</div>
								</li>
								{{-- <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{route('resource')}}">Resources</a>
                                   
								</li> --}}
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{route('blogs')}}">Our Story</a>
								</li>
                                {{-- <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{route('corporate')}}">For Corporates</a>
								</li> --}}
                                {{-- <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link hover_" href="{{route('becomeatutor')}}">Become a tutor</a>
                                  
								</li> --}}

                               
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{ route('gallery')}}">  Gallery </a>
								</li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{ route('results')}}">  Result </a>
								</li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link hover_" href="{{ route('contactus')}}">Contact Us</a>
								</li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 d-none d-md-block">
									<a class="nav-link hover_" href="https://www.facebook.com/profile.php?id=100079890684302"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
								</li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4  d-none d-md-block">
									<a class="nav-link hover_" href="https://www.instagram.com/mercuryentrance_pmna/?hl=en">  <i class="fa fa-instagram" aria-hidden="true"></i> </a>
								</li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4  d-none d-md-block">
									<a class="nav-link hover_" href="https://www.youtube.com/channel/UCU9GhDyNeGbxvizf5VRG_fw">  <i class="fa fa-youtube-play" aria-hidden="true"></i> </a>
								</li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4  d-none d-md-block">
									<a class="nav-link hover_"  href="https://api.whatsapp.com/send?phone=918089520038">    <i class="fa fa-whatsapp" aria-hidden="true"></i> </a>
								</li>
                               

                               

                               
							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
	</div>
 
</header>
{{-- <div style="margin-top:110px;">  </div> --}}
 
<!-- header end  -->


    <!--=========header end============-->
    @yield("header-section")
    @yield("content")
    <!--=========Footer Start============-->
    <footer class="r_footer">
        <div class="row">
            <div class="col-md-6 col-lg-4 col-sm-12 col-12">
                <h4 class="text-white font-weight-bold">
                Wsdom's Mercury Academy
                </h4>
                        <p class="text-white">
                            To become an inspiring doctor you need to be trained by the best. Our experienced tutors provide you with the best NEET coaching available. Our aim is to guide our repeaters to success with an amazing grade indeed and a promising future.
                        </p>

            </div>

            <div class="col-md-6 col-lg-4 col-sm-12 col-12 xl-text-center text-md-left text-lg-center r_footer__contact-details">
                <h4 class="text-white font-weight-bold"> We're here to help</h4>
                <div>
                    <a href="tel:+914872428119" title="Call +91 487 2428119"
                        class="r_footer__telephone"><span>{{$gens->phone1 ?? '+914872428119'}}</span></a>
                    <!-- <a href="tel:+91 487 2428119"> +91 487 2428119 </a> -->
                    <a href="mailto:info@devopsacadamia.com" title="Email info@devopsacadamia.com"
                        class=" r_footer__telephone"><span>{{$gens->email1 ??'info@devopsacadama.com'}}</span></a>
                    <a class="r_footer__contact" href="{{ route('contactus') }}">Contact us</a>
                </div>
                <div class="r_footer__social">
                    <a class="footer_soc_icon text-white"
                        href="{{$gens->linkedin=='' ? 'javascript:void(0)' : $gens->linkedin}}"> <i
                            class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                    <a class="footer_soc_icon text-white"
                        href="{{$gens->facebook=='' ? 'javascript:void(0)':$gens->facebook }}"><i class="fa fa-facebook"
                            aria-hidden="true"></i></a>
                    <a class="footer_soc_icon text-white"
                        href="{{$gens->twitter=='' ? 'javascript:void(0)' : $gens->twitter }}"> <i
                            class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a class="footer_soc_icon text-white"
                    href="https://www.youtube.com/channel/UCU9GhDyNeGbxvizf5VRG_fw">  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                   </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 col-sm-12 col-12 d-none d-md-block">
                <h4 class="text-white font-weight-bold"> Quick Menu</h4>
                <ul class="r_footer__list js-footerlist">
                    <li><a class="dropdown-item" href="{{route('home')}}">Home</a></li>
                    <li><a class="dropdown-item" href="{{route('about')}}">About</a></li>
                    {{-- <li><a href="{{route('howitworks')}}">How it works</a></li> --}}
                    {{-- <li><a href="{{route('resource')}}">Resources</a></li> --}}
                    <li><a class="dropdown-item" href="{{route('blogs')}}">Our story</a></li>
                    <li><a class="dropdown-item" href="{{route('gallery')}}">  Gallery</a></li>
                    <li><a class="dropdown-item" href="{{route('results')}}">  Results</a></li>
                    {{-- <li><a href="{{route('corporate')}}">For Corporates</a></li> --}}
                    {{-- <li><a href="{{route('faq')}}">FAQs</a></li> --}}
                    {{-- <li><a href="{{route('becomeatutor')}}">Become a tutor</a></li> --}}
                </ul>
            </div>
            <div class="col-md-6 col-lg-2 col-sm-12 col-12 d-none d-md-block">
                <h4 class="text-white font-weight-bold"> Quick Courses </h4>
                <ul class="r_footer__list js-footerlist">
                    @forelse ($courses as $course)
                    <li> <a class="dropdown-item"
                            href="{{route('course',$course->url_slug)}}">{{$course->product_name }}</a> </li>
                    @empty
                    <li> <a class="dropdown-item" href="javascript:void(0)">No Courses Yet</a> </li>
                    </li>
                    @endforelse

                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class=" row">
                <div class=" lap--one-half desk--one-half text-center col-12">
                    <p class="r_footer__copyright"> <a class="text-white"
                            href={{$gens->website ?? "http://reontel.com/"}}>{{$gens->webtitle}}
                        </a>
                    </p>
                    {{-- <p class="r_footer__terms">
                        <a href="terms-and-conditions.html">Terms &amp; Conditions</a> | <a
                            href="privacy-policy.html">Privacy Policy</a>
                    </p> --}}
                </div>
            </div>
        </div>
    </footer>
    <!--=========Footer end============-->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"> <img src="{{asset('assets/image/png/t_smple_png.png')}}" alt="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container_d">
                        <form action="" id="contact-form" method="POST">
                            <input type="text" id="name" class="f_col_12" name="name" placeholder="Name.." required>
                            <input type="text" id="email" class="f_col_12" name="email" placeholder="Email ID.."
                                required>
                            <input type="number" id="phone" class="f_col_12" name="phone" placeholder=" Phone Number.."
                                required>
                            <select id="course" class="f_col_12" name="course" required>
                                <option class="f_col_12" value="">Select a course</option>
                                @forelse ($courses as $course)
                                <option class="f_col_12" value="{{$course->id}}">{{$course->product_name }}</option>
                                @empty
                                <option class="f_col_12" value="Docker for beginners">Docker for beginners</option>
                                <option class="f_col_12" value="Docker in production">Docker in production</option>
                                <option class="f_col_12" value="Docker for administrators">Docker for administrators
                                </option>
                                <option class="f_col_12" value="Kubernetes for beginners">Kubernetes for beginners
                                </option>
                                <option class="f_col_12" value="Kubernetes in production">Kubernetes in production
                                </option>
                                <option class="f_col_12" value="Kubernetes administration">Kubernetes administration
                                </option>
                                <option class="f_col_12" value="DevOps: A career generator course">DevOps: A career
                                    generator course</option>
                                @endforelse

                            </select>
                            <!-- <label for="subject">Subject</label> -->
                            <textarea id="message" class="f_col_12" name="message"
                                placeholder="Write something.."></textarea>
                            <button type="button" id="request_tutor_btn" class=" f_col_12 r_button r_button--primary"
                                onclick="saveContact()">
                                <span class="ui-button-text ui-c f_col_12">request tutor</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Find a tutor  modal end -->
    {{-- <form id="#" method="post" action="#">
        <div class="cookiewarning ">
            <div class="inner">
                <p>
                    We use cookies to personalise your experience on the site. Let us know if you’re ok with this.
                    <button id="#" class="r_button r_button--xs r_button--primary" aria-label=""
                        type="submit"><span>Yes, that’s ok</span></button>
                </p>
            </div>
        </div>
    </form> --}}
    <script type="text/javascript" src="{{asset('assets/js/custom-02.js')}}"></script>
    
    <script src="{{asset('assets/bootstrap-4.0.0-dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toggle.js')}}"></script>
    <script src="assets/bootstrap-4.0.0-dist/js/popper.min.js"></script>
    {{-- <script type="text/javascript" src="{{asset('assets/js/nav_bar.js')}}"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"
        integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $('#navbar_devo').hide()
        });
        function saveContact() {
            if (checkValid()) {
                $('#request_tutor_btn').prop('disabled', true)
                var data = $('#contact-form').serialize();
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    url: "{{ route('ajaxsavecontact') }}",
                    method: "POST",
                    data: data,
                    success: function (result) {
                        console.log(result)
                        if (result == "Success") {
                            showMessage('Contact Sent!', '#15c39a')
                        } else {
                            showMessage('Something went wrong!', '#ca3b3b')
                        }
                        $('#request_tutor_btn').prop('disabled', false);
                        $('#contactModal').modal('toggle')
                    },
                    error: function (res) {
                        console.log(res)
                    }
                });
            } else {
                showMessage('Please Input all values!', '#ca3b3b')
            }
        }

        function showMessage(text, colour) {
            $.toast({
                text: text,
                showHideTransition: 'slide', // It can be plain, fade or slide
                bgColor: colour, // Background color for toast
                allowToastClose: true, // Show the close button or not
                hideAfter: 2000,
                position: 'top-right'
            })
        }

        function checkValid() {
            if ($.trim($('#name').val()) == '' || $.trim($('#email').val()) == '' || $.trim($('#phone').val()) == '' ||
                $('#course').val() == '') {
                return false;
            }
            return true
        }

        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                $('#navbar_devo').show()
                document.getElementById("navbar_devo").style.top = "0";
            } else {
                $('#navbar_devo').hide()
                document.getElementById("navbar_devo").style.top = "-80px";
            }
        }

    </script>

<!-- nav bar open -->
<script>


/* Please ❤ this if you like it! */


(function($) { "use strict";

$(function() {
   var header = $(".start-style");
   $(window).scroll(function() {    
      var scroll = $(window).scrollTop();
   
      if (scroll >= 10) {
         header.removeClass('start-style').addClass("scroll-on");
      } else {
         header.removeClass("scroll-on").addClass('start-style');
      }
   });
});		
   
//Animation

$(document).ready(function() {
   $('body.hero-anime').removeClass('hero-anime');
});

//Menu On Hover
   
$('body').on('mouseenter mouseleave','.nav-item',function(e){
      if ($(window).width() > 750) {
         var _d=$(e.target).closest('.nav-item');_d.addClass('show');
         setTimeout(function(){
         _d[_d.is(':hover')?'addClass':'removeClass']('show');
         },1);
      }
});	

//Switch light/dark

$("#switch").on('click', function () {
   if ($("body").hasClass("dark")) {
      $("body").removeClass("dark");
      $("#switch").removeClass("switched");
   }
   else {
      $("body").addClass("dark");
      $("#switch").addClass("switched");
   }
});  

})(jQuery); 
</script>
<!-- nav bar end  -->




    @yield('footerscript')
</body>

</html>
