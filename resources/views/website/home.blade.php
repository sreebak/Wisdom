@extends("website.theme.layout")
@section('mystyles')
<style>
   .marqueen_kp {
      top: 6em;
      position: relative;
      box-sizing: border-box;
      animation: marquee 15s linear infinite;
   }

   .marqueen_kp:hover {
      animation-play-state: paused;
   }

   /* Make it move! */
   @keyframes marquee {
      0% {
         top: 8em
      }

      100% {
         top: -11em
      }
   }


   .containermarqueen {
      width: 22em;
      height: 15em;
      margin: 10px auto;
      overflow: hidden;
      position: relative;
      box-sizing: border-box;
   }

   .marqueen_kp li {
      list-style-type: circle !important;
      margin-left: 18px;
   }

   .form-control {
      background-color: #ffffff96;
   }

   .Banner-Text {
      background: #0059ac4a;
      padding: 10px;
      border-radius: 15px;
   }

   .form-control {
      background-color: #0059ac4a !important;
   }

   ::-webkit-input-placeholder {
      /* Chrome/Opera/Safari */
      color: #fff !important;
   }

   ::-moz-placeholder {
      /* Firefox 19+ */
      color: #fff !important;
   }

   :-ms-input-placeholder {
      /* IE 10+ */
      color: #fff !important;
   }

   :-moz-placeholder {
      /* Firefox 18- */
      color: #fff !important;
   }

   .form-control {
      color: #ffffff !important;
   }

   .BannerSubmitBtn {
      background: #0856a1;
      padding: 5px 15px;
   }

   .swiper-button-prev {
      display: none;
   }

   .swiper-button-next {
      display: none;
   }
</style>
@endsection
@section('header-section')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<!-- {{-- ## slider open  --}} -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.js"></script>
<!-- {{-- ## slider end  --}} -->
{{--
<link  rel="stylesheet" type="text/css" href="../public/assets/css/home_style.css">
--}}


<link rel="stylesheet" type="text/css" href="{{asset('assets/css/home_style.css')}}">
@endsection
{{-- @dump($reviews) --}}
{{-- @dump($reviews); --}}
@section("content")
<div id="allcontent">
   <!-- Start of content snippet ID 720 -->
   <!-- {{--
   <div class="hero v3">
      <main>
         <section class="banner-bg_img">
            <div class="swiper-container">
               <div class="swiper-wrapper ">
                  <div class="swiper-slide" >
                     <h1><em>{{$homepage->banner1_title1}}</em> {{$homepage->banner1_title2}}</h1>
   <p>{!!$homepage->banner1_description!!}</p>
   <form method="post" action="#">
      <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#contactModal" onclick="return $('#contact-form')[0].reset()">
         <span class="ui-button-text ui-c">CONTACT US </span>
      </button>
   </form>
</div>
<div class="swiper-slide">
   <h1><em>{{$homepage->banner1_title1}}</em> {{$homepage->banner1_title2}}</h1>
   <p>{!!$homepage->banner1_description!!}</p>
   <form method="post" action="#">
      <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#contactModal" onclick="return $('#contact-form')[0].reset()">
         <span class="ui-button-text ui-c"> CONTACT US </span>
      </button>
   </form>
</div>
<div class="swiper-slide">
   <h1><em>{{$homepage->banner1_title1}}</em> {{$homepage->banner1_title2}}</h1>
   <p>{!!$homepage->banner1_description!!}</p>
   <form method="post" action="#">
      <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#contactModal" onclick="return $('#contact-form')[0].reset()">
         <span class="ui-button-text ui-c"> CONTACT US </span>
      </button>
   </form>
</div>
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>
</section>
<aside>
   <video autoplay="" muted="" loop="" id="myVideo" class="videoBG">
      <source src="assets/image/banner-video2.mp4" type="video/mp4">
   </video>
</aside>
</main>
</div> 
--}}-->
   <div style="height: 88px"></div>
   <!-- {{-- new banner open s  --}} -->
   <div class="swiper-container">
      <!-- swiper slides -->

      <div class="Banner_form">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12 col-lg-3 d-none d-lg-block">
                  <form action="" id="contact-form" method="POST">
                     <div class="form-group  ">
                        <input type="name" class="form-control validate" id="name" name="name" placeholder="Name ">
                     </div>
                     <div class="form-group  ">
                        <input type="phone" class="form-control validate" id="phone" name="phone" placeholder="Phone Number  ">
                     </div>
                     <div class="form-group  ">
                        <input type="email" class="form-control validate" id="email" name="email" placeholder="Email  ">
                     </div>
                     <div class="form-group  ">
                        <select id="course" name="course" class="form-control validate">
                        <option value='' selected>Select Your Courses </option>
                        @foreach ($products as $product)
                                   
                           
                           <option value="{{$product->id }}">{{$product->product_name }}</option>
                        @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <button type="button" class="btn btn-primary BannerSubmitBtn" id="request_tutor_btn" onclick="savecontact()"> Submit</button>
                     </div>
                  </form>
               </div>
               <div class=" col-12 col-lg-5 m-auto text-center text-white ">
                  <div class="Banner-Text">
                     <h1>
                     {{$homepage->banner_title}}
                     </h1>
                     <p class="text-center text-white">
                     {{strip_tags(htmlspecialchars_decode($homepage->banner_description))}}
                     </p>
                  </div>
               </div>
               <div class="col-12 col-lg-4  d-none d-md-block">


                  <!-- {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>

                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>

               
                <div class="collapse show " id="collapseExample1">
                  <div class="card card-body Banner_news_h">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                  </div>
                </div>
                <div class="collapse   " id="collapseExample">
                  <div class="card card-body  Banner_news_h">
                    111Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                  </div>
                </div> --}} -->


                  <!-- Buttons trigger collapse -->

                  <div class="nav nav-pills">
                     <!-- <a href="#prices" class="nav-link active" data-toggle="pill">
                      Prices
                  </a>   -->
                     <button onclick="location.href='#prices'" data-target="#prices" class="nav-link banner_btn_c active" data-toggle="pill"> Latest Question Paper </button> <br>
                     <button onclick="location.href='#features'" data-target="#features" class="nav-link  banner_btn_c  " data-toggle="pill">Usefull Links</button>

                     <!-- <a href="#features" class="nav-link" data-toggle="pill">
                      Features
                  </a>   -->
                  </div>
                  <div class="tab-content BannerNewBox">
                     <div class="tab-pane active" id="prices">

                        <div class="containermarqueen">



                           <ul class="marqueen_kp">
                           @foreach($questionpapers as $questionpaper)
                           <li> <a data-toggle="modal" data-id="{{$questionpaper->id}}" data-file="{{$questionpaper->file}}" data-target="#D-load-Contactform" href="#" class="update_Button"> {{ $questionpaper->title }}</a> </li>
                           @endforeach
                              
                              
                           </ul>
                        </div>

                     </div>
                     <div class="tab-pane" id="features">
                        <div class="containermarqueen">



                           <ul class="marqueen_kp">
                           @foreach($usefullinks as $usefullink)
                              <li> <a href="{{ url($usefullink->link_url) }}"> {{ $usefullink->link_name }}</a> </li>
                           @endforeach
                           </ul>
                        </div>

                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <div class="swiper-wrapper">
         <div class="swiper-slide text-white" style="background-image: url('{{asset('storage/homepageImages/'.$homepage->homepage_image1) }}');">
         
            <div class="Banner_tit text-center">
               <!-- <h2>SIMPLE SWIPER</h2>
            <p class="text-white">
               It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
            </p> -->
            </div>
         </div>
         <div class="swiper-slide text-white" style="background-image: url('{{asset('storage/homepageImages/'.$homepage->homepage_image2) }}');">
            <div class="Banner_tit text-center">
               <!-- <h2>SIMPLE SWIPER</h2>
            <p class="text-white">
               It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
            </p> -->
            </div>
         </div>
         <div class="swiper-slide text-white" style="background-image: url('{{asset('storage/homepageImages/'.$homepage->homepage_image3) }}');">
            <div class="Banner_tit text-center">
               <!-- <h2>SIMPLE SWIPER</h2>
            <p class="text-white">
               It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
            </p> -->
            </div>
         </div>
      </div>
      <!-- !swiper slides -->
      <!-- next / prev arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!-- !next / prev arrows -->
      <!-- pagination dots -->
      <div class="swiper-pagination"></div>
      <!-- !pagination dots -->
   </div>


   <div class="container">
      <div class=" d-block d-md-none mt-3 ">




         <div class="nav nav-pills">
            <button onclick="location.href='#pricesm'" data-target="#pricesm" class="nav-link banner_btn_c_xs active" data-toggle="pill"> Latest Question Paper </button> <br>
            <button onclick="location.href='#featuresm'" data-target="#featuresm" class="nav-link  banner_btn_c_xs  " data-toggle="pill">Usefull Links</button>


         </div>
         <div class="tab-content BannerNewBox">
            <div class="tab-pane active" id="pricesm">

               <div class="containermarqueen">



                  <ul class="marqueen_kp">
                  @foreach($questionpapers as $questionpaper)
                           <li> <a data-toggle="modal" data-id="{{$questionpaper->id}}" data-file="{{$questionpaper->file}}" data-target="#D-load-Contactform" href="javascript:void(0);" class="update_Button"> {{ $questionpaper->title }}</a> </li>
                           @endforeach
                    
                  </ul>
               </div>

            </div>
            <div class="tab-pane" id="featuresm">
               <div class="containermarqueen">



                  <ul class="marqueen_kp">
                  @foreach($usefullinks as $usefullink)
                              <li> <a href="{{ url($usefullink->link_url) }}"> {{ $usefullink->link_name }}</a> </li>
                           @endforeach
                    
                  </ul>
               </div>

            </div>
         </div>

      </div>

   </div>

   <!-- {{-- new banner end  --}} -->
   <!-- End of content snippet ID 720 -->
   <!-- Start of content snippet ID 892 -->
   <!-- {{-- -->
   <div class="mt-5 container-fluid">
      <div class="reviews-bar row ">
         <div class="reviews-bar__text reviews-bar__text--left col-xl-4 col-12"> Used by
            {{$homepage->school_count}}Career Seekers
         </div>
         <div class="reviews-bar__text reviews-bar__text--center  col-xl-4 col-12">
            <a href="#">
               <p> <img src="assets/svg/stars-steps.svg" alt="Stars" /> <span> {{$homepage->review_count}}
                  </span>reviews
               </p>
            </a>
         </div>
         <div class="reviews-bar__text reviews-bar__text--right  col-xl-4  col-12"> {{$homepage->note_count}} use our
            study notes
         </div>
      </div>
   </div>
   --}}
   <!-- End of content snippet ID 892 -->
   <!-- FEATURES START -->
   @forelse ($features as $key=>$feature)
   <div class="container-fluid">
      <div class="{{ $key%2==0 ? 'grid--rev' : ''}} row">
         <div class="grid-flow__item col-xl-6 col-lg-6 col-md m-auto ">
            <img class="Img_style" src="{{asset('storage/services/'.$feature->image1) }}" data-src="{{asset('storage/services/'.$feature->image1) }}" width="100%" alt="Online lessons" />
         </div>
         <div class="grid-flow__item   col-xl-6 col-lg-6 col-md align-self-center ">
            <div class="grid grid--full">
               <div class=" desk--five-sixths portable--five-sixths lap--one-whole">
                  <h3 class="river__header">{{ $feature->service_name }} <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
                           {{ $feature->short_description }}</span></span>
                  </h3>
                  <p class="river__paragraph text-justify txt-left">{!! $feature->long_description !!} </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   @empty
   <div class="container-fluid">
      <div class="grid--rev row ">
         <div class="grid-flow__item col-xl-6 col-lg-6 col-md m-auto "> <img src="assets/image/onlinetutor.png" data-src="assets/image/onlinetutor.png" width="100%" alt="Online lessons" /> </div>
         <div class="grid-flow__item   col-xl-6 col-lg-6 col-md align-self-center ">
            <div class="grid grid--full">
               <div class=" desk--five-sixths portable--five-sixths lap--one-whole">
                  <h3 class="river__header">Personalized <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
                           learning</span></span>
                  </h3>
                  <p class="river__paragraph text-justify txt-left"> Choose from over 30 subjects to keep your child learning from home.
                     They can learn fun new topics, revise old ones, and be guided through by friendly subject
                     experts.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   @endforelse
   <div class="col-xl-12 col-12 col-md-12 text-center mb-5">
      <!-- {{-- <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#exampleModalCenter"
      style="
      margin-top: 50px;
      "> --}}
   {{-- <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#contactModal"
      onclick="return $('#contact-form')[0].reset()">
   <span class="ui-button-text ui-c">Find a tutor</span>
   </button> --}} -->
   </div>
   <!-- FEATURES END -->
   <!-- {{-- ABOUT COURSE START--}} -->
   <div class="container-fluid  egg_blue">
      <div class="row">
         <div class=" grid-flow__item col-xl-5 col-lg-5 col-md-6 col-sm-6 col-12 m-auto "> <img src="assets/image/welcome_img.webp" data-src="assets/image/welcome_img.webp" class="img-fluid sm-had" alt="Handpicked tutors" />
         </div>
         <div class=" grid-flow__item  col-xl-7 col-lg-7 col-md-6 col-sm-6 col-12 align-self-center">
            <div class="grid grid--full grid--right">
               <div class="pr-5 pt-4 pb-4 sm_paddadj">
                  <!-- <h3 class="river__header"> <span class="skew-highlight skew-highlight--accent"><span class="unskew-text">Handpicked tutors,</span></span> wherever you live </h3> -->
                  <h3 class="river__header"> <span class="skew-highlight skew-highlight--accent"><span class="unskew-text">{{$homepage->banner2_title}}</span></span>
                  </h3>
                  <p class="river__paragraph river__paragraph--light">{!! $homepage->banner2_description !!}</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- {{-- ABOUT COURSE END--}} -->
   <!-- {{-- FAQ SECTION START--}} -->
   <!-- <div class="grid-flow__background--secondary">
   <div class="grid grid--full grid-flow--vertical-8  container">
      <h3 class="river__header"><span class="text-white"> Read our</span> <span
         class="skew-highlight skew-highlight--accent"><span class="unskew-text">FAQs</span></span>
      </h3>
      <div class="faq">
         <dl class="container__accordion">
            @forelse ($faqs as $faq)
            <dt class="open">{!! $faq->question !!}</dt>
            <dd>
               <p>
                  {!! $faq->answer !!}
               </p>
            </dd>
            @empty
            <dt class="open">Which instructor is right for you?</dt>
            <dd>
               <p>
                  Before you look for a instructor, it's helpful to have a really clear idea of exactly where your
                  child needs help - whether with a specific English Literature text, one area of Maths or
                  their exam technique - and filter your choices accordingly. If you're
                  not sure where they need to focus, having a chat with them or their teacher can help you
                  work out the best place to start. In a free meeting, you can then ask the instructor any
                  questions you like and see how well they get on
                  with your child before deciding to book.
               </p>
            </dd>
            @endforelse
         </dl>
      </div>
   </div>
   </div> -->
   <!-- {{-- FAQ SECTION END--}} -->
   <section class="pt-5" style="    background-color: aliceblue;">
      <h3 class="river__header text-center"> Our Proud <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
               Achievements </span></span>
      </h3>
      <div>
         <!-- Created by Rohan Hapani -->
         <div class="zoom-area">
            <!-- It's container of the magnify glass -->
            <div class="large"></div>
            <!-- It's for the small image -->
            
            <img class="small img-fluid small" src="{{asset('storage/homepageImages/'.$homepage->homepage_image4) }}" />
         </div>
      </div>
   </section>
   <div class="actionbanner grid grid--middle  grid--full grid-flow--vertical-8 mb-5" style="background-color: aliceblue;">
      <div class=" desk--one-whole">
         <img src="assets/svg/comment.svg" alt="Comment" width="50px" />
         <h3 class="river__header">{{$homepage->resources_title}}</h3>
         <p class="river__paragraph actionbanner__paragraph text-center">{!! $homepage->resources_description!!}</p>
         <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#exampleModalCenter">
            <span class="ui-button-text ui-c"><a style="color: white" href="{{route('resource')}}">{{$homepage->button_label}}</a></span>
         </button>
      </div>
   </div>
   <!-- <a class="river__button r_button r_button--primary r_button--l" href="#">Explore resources</a>  -->
   <!-- {{-- COURSE START --}} -->
   <!-- <div class="container-fluid">
   <div class="row">
       <div class="col-md-12">
           <div id="news-slider" class="owl-carousel owl-loaded owl-drag">
               <div class="owl-stage-outer">
                   <div class="owl-stage"
                       style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1644px;">
                       @forelse ($products as $product)
                       <div class="owl-item active" style="width: 411px;">
                           <div class="post-slide">
                               <div class="post-img">
                                   <img src="{{asset('storage/products/'.$product->image1)}}" onerror="this.src='/assets/image/default_img.webp'" alt="N0 image">
                                   <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                               </div>
                               <div class="post-content">
                                   <h3 class="post-title">
                                       <a href="#">{{$product->product_name}}</a>
                                   </h3>
                                   <p class="post-description">{{$product->short_description}} </p>
                                   <span class="post-date"><i
                                           class="fa fa-clock-o"></i>{{$product->start_date}}</span>
                                   {{-- <a href="#" class="read-more">read more</a> --}}
                               </div>
                           </div>
                       </div>
   
                       @empty
   
                       <div class="owl-item active" style="width: 411px;">
                           <div class="post-slide">
                               <div class="post-img">
                                   <img src="assets/image/family_guid_04.png" alt="">
                                   <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                               </div>
                               <div class="post-content">
                                   <h3 class="post-title">
                                       <a href="#">Lorem ipsum dolor sit amet.</a>
                                   </h3>
                                   <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing
                                       elit. </p>
                                   <span class="post-date"><i class="fa fa-clock-o"></i>Out 27, 2019</span>
                                   {{-- <a href="#" class="read-more">read more</a> --}}
                               </div>
                           </div>
                       </div>
                       @endforelse
   
                   </div>
               </div>
               <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                           aria-label="Previous">‹</span></button><button type="button" role="presentation"
                       class="owl-next"><span aria-label="Next">›</span></button></div>
               <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                       role="button" class="owl-dot"><span></span></button></div>
           </div>
       </div>
   
   </div>
   
   </div>  -->
   <div class="container-fluid">
      <!-- <h3 class="river__header">Enroll today in one of the best &amp; free <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
      devops course for developers!</span></span>
      </h3> -->
      <h3 class="river__header text-center"> Top-rated <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
               course </span></span>
      </h3>
      <div class="row">
         @forelse ($products as $product)
         <div class="col-12 col-sm-12 col-md-4">
            <div class="post-slide">
               <div class="post-img">
                  <img src="{{asset('storage/products/'.$product->image1)}}" onerror="this.src='assets/image/default_img.webp'" alt="N0 image">
                  <a href="javascript:void(0)" class="over-layer"><i class="fa fa-link"></i></a>
               </div>
               <div class="post-content">
                  <h3 class="post-title">
                     <a href="javascript:void(0)">{{$product->product_name}}</a>
                  </h3>
                  <p class="post-description">{{$product->short_description}} </p>
                  <span class="post-date"><i class="fa fa-clock-o"></i>{{$product->start_date}}</span>
               </div>
            </div>
         </div>
         @empty
            No Courses Yet
         @endforelse
      </div>
      <!-- {{--
   <div class="row">
      <div class="col-12 col-sm-12 col-md-4">
         <div class="post-slide">
            <div class="post-img">
               <img src="{{asset('storage/products/'.$product->image1)}}" onerror="this.src='assets/image/default_img.webp'" alt="N0 image">
   <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
</div>
<div class="post-content">
   <h3 class="post-title">
      <a href="#">{{$product->product_name}}</a>
   </h3>
   <p class="post-description text-justify txt-left">{{$product->short_description}} </p>
   <span class="post-date"><i class="fa fa-clock-o"></i>{{$product->start_date}}</span>
</div>
</div>
</div>
<div class="col-12 col-sm-12 col-md-4">
   <div class="post-slide">
      <div class="post-img">
         <img src="{{asset('storage/products/'.$product->image1)}}" onerror="this.src='assets/image/default_img.webp'" alt="N0 image">
         <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
      </div>
      <div class="post-content">
         <h3 class="post-title">
            <a href="#">{{$product->product_name}}</a>
         </h3>
         <p class="post-description">{{$product->short_description}} </p>
         <span class="post-date"><i class="fa fa-clock-o"></i>{{$product->start_date}}</span>
      </div>
   </div>
</div>
<div class="col-12 col-sm-12 col-md-4">
   <div class="post-slide">
      <div class="post-img">
         <img src="{{asset('storage/products/'.$product->image1)}}" onerror="this.src='assets/image/default_img.webp'" alt="N0 image">
         <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
      </div>
      <div class="post-content">
         <h3 class="post-title">
            <a href="#">{{$product->product_name}}</a>
         </h3>
         <p class="post-description">{{$product->short_description}} </p>
         <span class="post-date"><i class="fa fa-clock-o"></i>{{$product->start_date}}</span>
      </div>
   </div>
</div>
</div>
--}} -->
   </div>
   <div class="egg_blue mt-5">
      <div class="grid grid--center grid--middle  grid--full">
         <div class=" desk--one-whole">
            <div class="reviewpanel reviewpanel--blue">
               <img src="assets/svg/googel_rev.webp" class="img-fluid" alt="">
               <p class="googel_re text-justify"> {!!$homepage->google_description1!!}
               </p>
               <div class="reviewpanel__wrapper slick2016" id="js-homeslickreviews">
                  {{-- @dump($reviews) --}}
                  @forelse ($reviews as $review)
                  <div class="reviewpanel__card">
                     <div class="reviewpanel__tutorwrapper d-flex">
                        <img class="reviewpanel__avatar" src="{{asset('storage/projects/'.$review->image1) }}" alt="Alicia" />
                        <div class="reviewpanel__meta">
                           <p class="reviewpanel__tutor">{{ $review->project_name }} </p>
                           <p class="reviewpanel__subject" style="
                           word-break: break-word;
                           ">{{$review->client_name}}
                           </p>
                           <p class="reviewpanel__sessioncount"> <img src="assets/svg/stars--reviewcard.svg" alt="Stars" />
                           </p>
                        </div>
                     </div>
                     <div class="reviewpanel__reviewwrapper">
                        <!-- {{--
                     <p class="reviewpanel__author">{{ $review->project_name }}
                     <span>{{ $review->project_type }}</span>
                     </p>
                     --}} -->
                        <p class="reviewpanel__bio" style="
                        word-break: break-word;
                        ">{{ $review->short_description}}</p>
                     </div>
                  </div>
                  @empty
                  <!-- ----- 5------- -->
                  <div class="reviewpanel__card">
                     <div class="reviewpanel__tutorwrapper">
                        <img class="reviewpanel__avatar" src="assets/image/demo_re.png" alt="Alicia" />
                        <div class="reviewpanel__meta">
                           <p class="reviewpanel__tutor text-uppercase">Ivaan </p>
                           <p class="reviewpanel__subject">1 reviews 
                           </p>
                           <p class="reviewpanel__sessioncount"> <img src="assets/svg/stars--reviewcard.svg" alt="Stars" />
                           </p>
                        </div>
                     </div>
                     <div class="reviewpanel__reviewwrapper">
                        <!-- <p class="reviewpanel__author">Natalya M. <span>Parent</span>
                        </p> -->
                        <p class="reviewpanel__bio"> Excellent course features. Almost all the DevOps modules were covered. Very satisfied with the curriculum relevance, quality of faculty, assignments & I learnt more than what I expected. Good experience overall..!! </p>
                     </div>
                  </div>
                  <!-- ----- 6------- -->
                  <div class="reviewpanel__card">
                     <div class="reviewpanel__tutorwrapper">
                        <img class="reviewpanel__avatar" src="assets/image/demo_re.png" alt="Alicia" />
                        <div class="reviewpanel__meta">
                           <p class="reviewpanel__tutor text-uppercase"> Nirved </p>
                           <p class="reviewpanel__subject">1 reviews 
                           </p>
                           <p class="reviewpanel__sessioncount"> <img src="assets/svg/stars--reviewcard.svg" alt="Stars" />
                           </p>
                        </div>
                     </div>
                     <div class="reviewpanel__reviewwrapper">
                        <!-- <p class="reviewpanel__author">Natalya M. <span>Parent</span>
                        </p> -->
                        <p class="reviewpanel__bio"> Well experienced and highly skilled faculty that helped me in academics. They guided me from beginning to end.
                           They covered each and every modules and conducted knowledge development sessions too.
                        </p>
                     </div>
                  </div>
                  <!-- ----- 7------- -->
                  <div class="reviewpanel__card">
                     <div class="reviewpanel__tutorwrapper">
                        <img class="reviewpanel__avatar" src="assets/image/demo_re.png" alt="Alicia" />
                        <div class="reviewpanel__meta">
                           <p class="reviewpanel__tutor text-uppercase"> Samuel </p>
                           <p class="reviewpanel__subject">1 reviews 
                           </p>
                           <p class="reviewpanel__sessioncount"> <img src="assets/svg/stars--reviewcard.svg" alt="Stars" />
                           </p>
                        </div>
                     </div>
                     <div class="reviewpanel__reviewwrapper">
                        <!-- <p class="reviewpanel__author">Natalya M. <span>Parent</span>
                        </p> -->
                        <p class="reviewpanel__bio"> In my experience, they operates with a more personalized approach and tries to drive each and everyone to explore more. And I would highly recommend Devops Academia.</p>
                     </div>
                  </div>
                  <!-- ----- 8------- -->
                  <div class="reviewpanel__card">
                     <div class="reviewpanel__tutorwrapper">
                        <img class="reviewpanel__avatar" src="assets/image/demo_re.png" alt="Alicia" />
                        <div class="reviewpanel__meta">
                           <p class="reviewpanel__tutor text-uppercase"> Vincent </p>
                           <p class="reviewpanel__subject">1 reviews 
                           </p>
                           <p class="reviewpanel__sessioncount"> <img src="assets/svg/stars--reviewcard.svg" alt="Stars" />
                           </p>
                        </div>
                     </div>
                     <div class="reviewpanel__reviewwrapper">
                        <!-- <p class="reviewpanel__author">Natalya M. <span>Parent</span>
                        </p> -->
                        <p class="reviewpanel__bio"> Knowledge sharing is just perfect and it is worth the time. In my opinion they have thoroughly covered syllabus and a little effort from our side will make it wholesome.</p>
                     </div>
                  </div>
                  @endforelse
               </div>
               <!-- {{-- <button type="button" class=" r_button r_button--primary">
            <span class="ui-button-text ui-c">SPEAK TO DEVOPS EXPERTS</span>
            </button> --}} -->
               <a target="_blank" href="https://www.google.com/search?q=wisdome+mercury+ayanthol&oq=wisdome+mercury+ayanthol+&aqs=chrome..69i57j33i160l2.10641j1j7&sourceid=chrome&ie=UTF-8#lrd=0x3ba7ee6a30aa5a27:0x4e3c3ffb9a415630,1,,," class="read-more read_more_">READ MORE</a>
            </div>
            <div class="grid grid--middle  grid--full">
               <div class=" desk--one-whole">
                  <div class="actionbanner actionbanner--short actionbanner--border-top">
                     <div class="actionbanner__wrapper">
                        <h2 class="actionbanner__header actionbanner__header--medium" style="
                        margin-bottom: 0px;
                        ">
                           {!! $homepage->google_description2!!}
                        </h2>
                        <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#contactModal" onclick="return $('#contact-form')[0].reset()" style="
                        margin-top: 20px;">
                           <span class="ui-button-text ui-c"> REACH OUT TO US </span>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- {{-- popup s  --}} -->
   <!-- {{-- ###########  --}} -->
   <!-- Modal -->
   
<div class=" modal M_scroll fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">

<div class=" modal-dialog modal-dialog75 modal-dialog-centered " role="document">
   
   <div class="modal-content">
      
         <div class="modal-header">
            <!-- <h3 class="river__header"> WISDOM'S MERCURY ACADEMY<span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
               <a class="d-none text-white  d-md-block" href="tel:9544998866"> +91 9544998866</a></span></span>
            </h3> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         
         <div class="modal-body Collage_Modal">
         
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            
               <div class="carousel-inner">
                  @foreach($sliders as $key=>$slider)
                  <div class="carousel-item {{ $key==0 ?'active':'' }}">
                  
                     <img src="{{ url('storage/sliders/'.$slider->image1) }}" class=" img-fluid" alt="slider">
                  
                  </div>
                  @endforeach
                 {{-- <div class="carousel-item">
                  <img src="{{ url('storage/sliders/'.$slider->image1) }}" class=" img-fluid" alt="slider">
                  </div>--}}
                  
               </div>
               
               
            
               
            </div>
            
         </div>
         
         <div class="Pop_up">
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </button>
         </div>
         
      </div>
      
   </div>
  
</div>

   <!-- {{-- pop up e  --}}

{{-- scroll news s  --}} -->
   <div class="condainer sCROLLING_NEWS">
      <div class="row">
         <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
               <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp; Latest News </span></div>
               
               <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
               @foreach($news as $newss)
               <span class="dot"></span>
               <a href="#">{{strip_tags(htmlspecialchars_decode($newss->news))}} </a>  
               @endforeach
            </marquee>
               
            </div>
         </div>
      </div>
   </div>
   <!-- {{-- scroll news e  --}}

{{-- social bar s  --}} -->

   <div id="fixed-social">
      <div>
         <a href="tel:00919544998866" class="fixed-facebook" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i> </a>
      </div>
      <div>
         <a href="https://api.whatsapp.com/send?phone=918089520038" class="fixed-linkedin" target="_blank"><i class="fa fa-whatsapp"></i> </a>
      </div>
      <div>
         <a href="mailto:mailto:wmsmercury@gmail.com" class="fixed-instagrem" target="_blank"><i class="fa fa-envelope"></i> </a>
      </div>
   </div>


   <!-- modal start  -->

  <!-- Modal -->


 

<div class="modal fade" id="D-load-Contactform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: white !important;">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold pt-3">Write to us</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="contact-form1" method="POST">
      <div class="modal-body mx-3 Modalscr">
      
        <div class="md-form  "> 
          <input type="text" placeholder="Name" id="qd_name" name="qd_name" class="form-control validate">
          <input type="hidden" placeholder="Name" id="q_id" name="q_id" class="form-control validate">  
          <input type="hidden" placeholder="Name" id="qfile" name="qfile" class="form-control validate"> 
        </div>

        <div class="md-form  "> 
          <input type="email" id="qd_email" name="qd_email" placeholder="Email" class="form-control validate" style="margin-bottom:8px;"> 
        </div>

        <div class="md-form  "> 
          <input type="text" id="qd_phone" name="qd_phone" placeholder="Phone Number" class="form-control validate"> 
        </div>

        <div class="md-form"> 
          <textarea type="text" id="message" name="message" placeholder="Your message" class="md-textarea form-control" rows="2"></textarea> 
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
      <button type="button" class=" r_button r_button--primary" data-toggle="modal" data-target="#exampleModalCenter" id="request_tutor_btn" onclick="saveQuestionpaperDownloads()">
              Download 
         </button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Launch
    Modal Contact Form</a>
</div>
   <!-- modal end  -->

   <!-- {{-- social bar e  --}} -->
   @endsection
   @section("footerscript")
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
   <script type="text/javascript">
      $(window).on('load', function() {
         $('#myModal').modal('show');
      });
   </script>
   <script type="text/javascript">
      $(document).on('click','.update_Button',function(e){
         //alert();
      e.preventDefault();
      $('#D-load-Contactform').modal('toggle');
      var id =$(this).attr('data-id');
      var file =$(this).attr('data-file');
                    $('#q_id').val(id);
                    $('#qfile').val(file);
   });
     
   </script>
   <script>
      $('#myModal').on('shown.bs.modal', function() {
         $('#myInput').trigger('focus')
      })
   </script>
   <script>
      $('.owl-carousel').owlCarousel({
         loop: true,
         margin: 10,
         responsiveClass: true,
         responsive: {
            0: {
               items: 1,
               nav: true
            },
            400: {
               items: 2,
               nav: false
            },
            800: {
               items: 3,
               nav: false
            },
            1800: {
               items: 5,
               nav: true,
               loop: false
            }
         }
      })
   </script>
   <script>
      $(document).ready(function() {
         $("#js-homeslickreviews").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            responsive: [{
               breakpoint: 992,
               settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true
               }
            }, {
               breakpoint: 768,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true
               }
            }]
         })
      });
      function saveQuestionpaperDownloads() {
         var qfile=$('#qfile').val();
            if (checkValids()) {
                $('#request_tutor_btn').prop('disabled', true)
                var data = $('#contact-form1').serialize();
                
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    url: "{{ route('saveQuestionpaperDownloads') }}",
                    method: "POST",
                    data: data,
                    success: function (result) {
                        console.log(result)
                        if (result == "Success") {
                            showMessage('Contact Sent!', '#15c39a')
                            window.open(
                              'storage/questionpapers/'+qfile,
                              '_blank' // <- This is what makes it open in a new window.
                            );
                            
                        } else {
                            showMessage('Something went wrong!', '#ca3b3b')
                        }
                        $('#request_tutor_btn').prop('disabled', false);
                        $('#D-load-Contactform').modal('toggle')
                    },
                    error: function (res) {
                        console.log(res)
                    }
                });
            } else {
                showMessage('Please Input all values!', '#ca3b3b')
            }
        }
        function savecontact() {
            if (checkValid()) {
                $('#request_tutor_btn').prop('disabled', true)
                var data = $('#contact-form').serialize();
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    },
                    url: "{{ route('SaveContacts') }}",
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
        function checkValids() {
            if ($.trim($('#qd_name').val()) == '' || $.trim($('#qd_email').val()) == '' || $.trim($('#qd_phone').val()) == '' ||
                $('#message').val() == '') {
                return false;
            }
            return true
        }
      $(document).ready(function() {
         var a = $(".riverreviewcarousel__item");
         $("#js-riverreviewcarousel--previous").click(function() {
            var e = $(".riverreviewcarousel__item--previous");
            var f = $(".riverreviewcarousel__item--current");
            var d = $(".riverreviewcarousel__item--next");
            e.removeClass("riverreviewcarousel__item--previous");
            f.removeClass("riverreviewcarousel__item--current").addClass(
               "riverreviewcarousel__item--previous");
            d.removeClass("riverreviewcarousel__item--next").addClass(
               "riverreviewcarousel__item--current");
            var c = d.attr("id").slice(-1);
            var b = (parseInt(c) + 1);
            if (b > a.length) {
               $("#js-riverreviewcarousel-1").addClass(
                  "riverreviewcarousel__item--next")
            } else {
               $("#js-riverreviewcarousel-" + b).addClass(
                  "riverreviewcarousel__item--next")
            }
         });
         $("#js-riverreviewcarousel--next").click(function() {
            var f = $(".riverreviewcarousel__item--current");
            var d = $(".riverreviewcarousel__item--next");
            var e = $(".riverreviewcarousel__item--previous");
            d.removeClass("riverreviewcarousel__item--next");
            f.removeClass("riverreviewcarousel__item--current").addClass(
               "riverreviewcarousel__item--next");
            e.removeClass("riverreviewcarousel__item--previous").addClass(
               "riverreviewcarousel__item--current");
            var b = e.attr("id").slice(-1);
            var c = (parseInt(b) - 1);
            if (c == 0) {
               $("#js-riverreviewcarousel-" + a.length).addClass(
                  "riverreviewcarousel__item--previous")
            } else {
               $("#js-riverreviewcarousel-" + c).addClass(
                  "riverreviewcarousel__item--previous")
            }
         })
      });
   </script>
   <!-- open -->
   <script>
      /* Please ❤ this if you like it! */


      (function($) {
         "use strict";

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

         $('body').on('mouseenter mouseleave', '.nav-item', function(e) {
            if ($(window).width() > 750) {
               var _d = $(e.target).closest('.nav-item');
               _d.addClass('show');
               setTimeout(function() {
                  _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
               }, 1);
            }
         });

         //Switch light/dark

         $("#switch").on('click', function() {
            if ($("body").hasClass("dark")) {
               $("body").removeClass("dark");
               $("#switch").removeClass("switched");
            } else {
               $("body").addClass("dark");
               $("#switch").addClass("switched");
            }
         });

      })(jQuery);
   </script>
   <script>
      var Swipes = new Swiper('.swiper-container', {
         loop: true,
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
         },
         pagination: {
            el: '.swiper-pagination',
         },
         autoplay: {
            delay: 2000,
         },
      });
   </script>
   <script>
      /* Created by Rohan Hapani */
      $(document).ready(function() {
         var sub_width = 0;
         var sub_height = 0;
         $(".large").css("background", "url('" + $(".small").attr("src") + "') no-repeat");

         $(".zoom-area").mousemove(function(e) {
            if (!sub_width && !sub_height) {
               var image_object = new Image();
               image_object.src = $(".small").attr("src");
               sub_width = image_object.width;
               sub_height = image_object.height;
            } else {
               var magnify_position = $(this).offset();

               var mx = e.pageX - magnify_position.left;
               var my = e.pageY - magnify_position.top;

               if (mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0) {
                  $(".large").fadeIn(100);
               } else {
                  $(".large").fadeOut(100);
               }
               if ($(".large").is(":visible")) {
                  var rx = Math.round(mx / $(".small").width() * sub_width - $(".large").width() / 2) * -1;
                  var ry = Math.round(my / $(".small").height() * sub_height - $(".large").height() / 2) * -1;

                  var bgp = rx + "px " + ry + "px";

                  var px = mx - $(".large").width() / 2;
                  var py = my - $(".large").height() / 2;

                  $(".large").css({
                     left: px,
                     top: py,
                     backgroundPosition: bgp
                  });
               }
            }
         })
      })
   </script>
   <!-- banner news  -->
   <script>
      jQuery.fn.liScroll = function(settings) {
         settings = jQuery.extend({
            travelocity: 0.03
         }, settings);
         return this.each(function() {
            var $strip = jQuery(this);
            $strip.addClass("newsticker")
            var stripHeight = 1;
            $strip.find("li").each(function(i) {
               stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
            });
            var $mask = $strip.wrap("<div class='mask'></div>");
            var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");
            var containerHeight = $strip.parent().parent().height(); //a.k.a. 'mask' width 	
            $strip.height(stripHeight);
            var totalTravel = stripHeight;
            var defTiming = totalTravel / settings.travelocity; // thanks to Scott Waye		
            function scrollnews(spazio, tempo) {
               $strip.animate({
                  top: '-=' + spazio
               }, tempo, "linear", function() {
                  $strip.css("top", containerHeight);
                  scrollnews(totalTravel, defTiming);
               });
            }
            scrollnews(totalTravel, defTiming);
            $strip.hover(function() {
                  jQuery(this).stop();
               },
               function() {
                  var offset = jQuery(this).offset();
                  var residualSpace = offset.top + stripHeight;
                  var residualTime = residualSpace / settings.travelocity;
                  scrollnews(residualSpace, residualTime);


               });
            // $(".newsticker").animate(1000, 'linear', ticker);

         });
      };

      // $(function() {
      //    $("ul#ticker01").liScroll();
      // });
   </script>
   @endsection