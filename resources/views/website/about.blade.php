@extends("website.theme.layout")
@section('mystyles')
<style>
 
 .carousel-indicators li { 
    background-color: rgb(0 129 108 / 50%);
} 
/* body {
  font-size: 16px;
  font-weight: 300;
  line-height: 23px; 
} */
.carousel-indicators .active {
    background-color: #000;
}
ul {
  list-style-type: none;
}

a,
a:hover {
  text-decoration: none;
}

 
body .testimonial {
  padding: 100px 0;
}
body .testimonial .row .tabs {
  all: unset;
  margin-right: 50px;
  display: flex;
  flex-direction: column;
}
body .testimonial .row .tabs li {
  all: unset;
  display: block;
  position: relative;
}
body .testimonial .row .tabs li.active::before {
  position: absolute;
  content: "";
  width: 50px;
  height: 50px;
  background-color: #00bda8;
  border-radius: 50%;
}
body .testimonial .row .tabs li.active::after {
  position: absolute;
  content: "";
  width: 30px;
  height: 30px;
  background-color: #00bda8;
  border-radius: 50%;
}
body .testimonial .row .tabs li:nth-child(1) {
  align-self: flex-end;
}
body .testimonial .row .tabs li:nth-child(1)::before {
  left: 64%;
  bottom: -50px;
}
body .testimonial .row .tabs li:nth-child(1)::after {
  left: 97%;
  bottom: -81px;
}
body .testimonial .row .tabs li:nth-child(1) figure img {
  margin-left: auto;
}
body .testimonial .row .tabs li:nth-child(2) {
  align-self: flex-start;
}
body .testimonial .row .tabs li:nth-child(2)::before {
  right: -65px;
  top: 50%;
}
body .testimonial .row .tabs li:nth-child(2)::after {
  bottom: 101px;
  border-radius: 50%;
  right: -120px;
}
body .testimonial .row .tabs li:nth-child(2) figure img {
  margin-right: auto;
  max-width: 300px;
  width: 100%;
  margin-top: -50px;
}
body .testimonial .row .tabs li:nth-child(3) {
  align-self: flex-end;
}
body .testimonial .row .tabs li:nth-child(3)::before {
  right: -10px;
  top: -66%;
}
body .testimonial .row .tabs li:nth-child(3)::after {
  top: -130px;
  border-radius: 50%;
  right: -46px;
}
body .testimonial .row .tabs li:nth-child(3) figure img {
  margin-left: auto;
  margin-top: -50px;
}
body .testimonial .row .tabs li:nth-child(3):focus {
  border: 10px solid red;
}
body .testimonial .row .tabs li figure {
  position: relative;
}
body .testimonial .row .tabs li figure img {
  display: block;
}
body .testimonial .row .tabs li figure::after {
  content: "";
  position: absolute;
  top: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  border: 4px solid #dff9d9;
  border-radius: 50%;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}
body .testimonial .row .tabs li figure:hover::after {
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
}
body .testimonial .row .tabs.carousel-indicators li.active figure::after {
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
}
body .testimonial .row .carousel > h3 {
  font-size: 20px;
  line-height: 1.45;
  color: rgba(0, 0, 0, 0.5);
  font-weight: 600;
  margin-bottom: 0;
}
body .testimonial .row .carousel h1 {
  font-size: 40px;
  line-height: 1.225;
  margin-top: 23px;
  font-weight: 700;
  margin-bottom: 0;
}
body .testimonial .row .carousel .carousel-indicators {
  all: unset;
  padding-top: 43px;
  display: flex;
  list-style: none;
}
 
body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper {
  margin-top: 42px;
}
body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper p {
  font-size: 18px;
  line-height: 1.72222;
  font-weight: 500;
  color: rgba(0, 0, 0, 0.7);
}
body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper h3 {
  color: #000;
  font-weight: 700;
  margin-top: 37px;
  font-size: 20px;
  line-height: 1.45;
  text-transform: uppercase;
}

 
/* banner open  */
.hero.v3 main { 
    height: 60vh; 
}
.hero.v3 main aside { 
    height: 60vh; 
}
.hero.v3 main aside img { 
    height: 60vh;
}
 
/* banner end  */
 
@media only screen and (max-width: 1200px) {
  body .testimonial .row .tabs {
    margin-right: 25px;
  }
}
</style>
@endsection
@section('header-section')
<section>
    <!-- <div>
        <img src="{{ asset('assets/image/about_us_page_banner.jpg') }}" class="img-fluid w-100">
    </div> -->
    <!-- Start of content snippet ID 93 (pricing_12082015) -->
    <div class="hero v3">
        <main>
            <section  class="banner-bg_img">
                <h1> 
                  <em>About Us</em>
                </h1>
                <!-- <p>
                    Flexible, fulfilling and fits into your schedule
                </p> -->
                <!-- {{-- <a class="r_button r_button--primary max_width_160" href="#"> APPLY NOW </a> --}} -->
            </section>
            <aside> <img src="assets/image/inner_banner01.webp" data-src="assets/image/inner_banner01.webp"
                    alt="prices-01.jpg"> </aside>
        </main>
    </div>
    <!-- End of content snippet ID 93 (pricing_12082015) -->
</section>
@endsection


@section("content")
 

<section>
    

    @forelse ($features as $key=>$feature)
    <div class="container-fluid">
        <div class="{{ $key%2==0 ? 'grid--rev' : ''}} row">
            <div class="grid-flow__item col-xl-6 col-lg-6 col-md "> <img
                    src="{{asset('storage/services/'.$feature->image1) }}"
                    data-src="{{asset('storage/services/'.$feature->image1) }}" width="100%" alt="Online lessons" />
            </div>
            <div class="grid-flow__item   col-xl-6 col-lg-6 col-md align-self-center ">
                <div class="grid grid--full pt-5">
                    <div class=" desk--five-sixths portable--five-sixths lap--one-whole">
                        <h3 class="river__header">{{ $feature->service_name }} <span
                                class="skew-highlight skew-highlight--primary"><span class="unskew-text">
                                    {{ $feature->short_description }}</span></span>
                        </h3>
                        <p class="river__paragraph">{!! $feature->long_description !!} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="container-fluid">
    <!-- certification -->
        <div class="grid--rev row">
            <div class="grid-flow__item col-xl-6 col-lg-6 col-md-12  col-12 align-self-center "> <img src="assets/image/welcome_img.webp"
                    data-src="assets/image/welcome_img.webp" width="100%" alt="Online lessons" /> </div>
            <div class="grid-flow__item   col-xl-6 col-lg-6  col-md-12 col-12 align-self-center ">
                <div class="grid grid--full pt-5">
                    <div class=" desk--five-sixths portable--five-sixths lap--one-whole">
                        <b>  About us </b>
                                                <h3 class="river__header">  Mercury Entrance  <span
                                class="skew-highlight skew-highlight--primary"><span class="unskew-text">
                                    Welcome to the   </span></span>
                        </h3>
                        <p class="river__paragraph"> 
                            Mercury Entrance has gotten one of the top foundations in Kerala through its total devotion in conveying quality knowledge. Our prime witticism is to bestow rich instruction to all the teenagers and youths for a more promising future to come. We have experienced faculty who provide individual attention for each student and make sure that they are ready to achieve their goal. Our's is a multidisciplinary organization that cooks each instructive need of understudies from schools to post graduate projects. Our preparation will consummately set you up for any serious tests, not to simply pass, yet to dominate.
                        </p>
                        

                    </div>
                </div>
            </div>
        </div>
        {{-- ###  --}}
        <div class="grid--rev row">
           
            <div class="grid-flow__item   col-xl-6 col-lg-6  col-md-12 col-12 align-self-center ">
                <div class="grid grid--full pt-5">
                    <div class=" desk--five-sixths portable--five-sixths lap--one-whole">
                        <b>Director's Message</b>
                        <h3 class="river__header">  Mercury Entrance <span
                                class="skew-highlight skew-highlight--primary"><span class="unskew-text">
                                    ,Director  </span></span>
                        </h3>
                        <p class="river__paragraph"> 
                            Our mission is to discover the innate spark of talent in children and develop it without fixing any discriminatory standards or artificial filters. This is to prove that every child can achieve immense success. That principle is our guiding force. Every child has its own special individual skills and talents. Our unique approach starts with finding that individual pattern of talent in each child and to become one among them to understand them fully. When parents too support their children in full measure, our approach will be fortified further. Mercury Entrance will always be at your service with full dedication to enable your child’s education.
                        </p>
                        

                    </div>
                </div>
            </div>
            <div class="grid-flow__item col-xl-6 col-lg-6 col-md-12  col-12 align-self-center "> <img src="assets/image/director-s-essage.webp"
                data-src="assets/image/about_01_.png" width="100%" alt="Online lessons" /> </div>
        </div>
    </div>
    @endforelse
</section>



<section>
<div class="grid-flow__background--secondary">
   <div class="grid grid--full grid-flow--vertical-8  container">
   <p class="river__paragraph text-white text-center"> 
    Education is the
    passport to the future,
    for tomorrow belongs to
    those who prepare for
    it today. 
</p>
                        
                        
                     
                       
      
   </div>
</div>
</section>

<section class="pt-5 pb-4">
 
</section>




 
<!-- img end -->

{{-- <section class=" about_foot_section pt-5 pb-5">
    <div class="row">
        <div class="col-12 text-center">
            <img src="assets/image/home_about.png" class="img-fluid" alt="">

            <h3 class="river__header"> We’re hiring! Come join our team</h3>
            <h5>
                We’re a growing team of in industry expertes , and we’re going from strength to
                strength.
            </h5>

<div class="container text-left mt-4">
<p class="river__paragraph"> 
            We are hiring Online DevOps Instructors who have experience and are interested in providing online teaching lessons to aspiring students and working professionals. 
            </p>
            <p class="river__paragraph"> 
            If you have the calibre and the zeal to teach online this is the right job where you can work while sitting from your home or any other location irrespective of travelling. This is a ‘work from home’ opportunity, where you can work at any time, using any digital device like computer, laptop, mobile etc. along with a good working WiFi or any other internet connection.
</p>
<p class="river__paragraph"> 
If you are looking for a Rewarding, Flexible and Well-paid Career then this is the opportunity where you can earn online at your convenience. 
</p>
</div>
 

           
        </div>
    </div>
</section> --}}
<!-- main end  -->

{{-- ### txt mo open  --}}
 
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block">
                    <ol class="carousel-indicators tabs">

                        <li data-target="#carouselExampleIndicators" data-slide-to="0"  class="active">
                            <figure>
                                <img src="https://livedemo00.template-help.com/wt_62267_v8/prod-20823-one-service/images/testimonials-02-306x306.png" class="img-fluid" alt="">
                            </figure>
                        </li>

                        <li data-target="#carouselExampleIndicators" data-slide-to="1" >
                            <figure>
                                <img src="assets/image/tes1.webp" class="img-fluid" alt=""   >
                            </figure>
                        </li>
                       
                        <li data-target="#carouselExampleIndicators" data-slide-to="2">
                            <figure>
                                <img src="https://livedemo00.template-help.com/wt_62267_v8/prod-20823-one-service/images/testimonials-03-179x179.png" class="img-fluid" alt="">
                            </figure>
                        </li>
                       
                    </ol>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <div id="carouselExampleIndicators" data-interval="false" class="carousel slide" data-ride="carousel">
                        <h3> Students Reviews </h3>
                        <h1>TESTIMONIALS</h1>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="quote-wrapper">
                                    <p>   Hello everyone I am Eldho George. I joined mercury in the year 2019 for neet coaching. They supported me a lot. They supported me in all kind of stressful situations. when my confidence falls down they supported a lot to increase the confidence and to score well in the exams.</p>
                                    <h3>ELDHO GEORGE</h3>
                                    <h4>NEET REPEATER BATCH 2019 - 2020</h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="quote-wrapper">
                                    <p>  Hello, I am Harikrishnan P J. I joined Mercury as a repeater in NEET 2020 examination. We have a awesome experience in there. Faculties are very friendly and experts in this field. Office staffs provides all the facilities we needed also they give better instructions and strategies to improve the way of learning...</p>
                                    <h3>HARIKRISHNAN P J  </h3>
                                    <h4> NEET REPEATER BATCH 2019 - 2020  </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="quote-wrapper">
                                    <p>   
                                          I’m Aneeta Shajan. I’ve joined Mercury in 2019 June. I’m satisfied and happy with the quality teaching and productive environment provided by them. They instilled confidence in me to set the goal and I’m grateful to be a part of this institute. </p>
                                      <h3> ANEETA SHAJAN  </h3>
                                    <h4> NEET REPEATER BATCH 2019 - 2020 </h4>
                                </div>
                            </div>
                        </div>
                        <ol class="carousel-indicators indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
 


{{-- text mo end  --}}

 <script>
    $(document).ready(function(){
  $(".testimonial .indicators li").click(function(){
    var i = $(this).index();
    var targetElement = $(".testimonial .tabs li");
    targetElement.eq(i).addClass('active');
    targetElement.not(targetElement[i]).removeClass('active');
            });
            $(".testimonial .tabs li").click(function(){
                var targetElement = $(".testimonial .tabs li");
                targetElement.addClass('active');
                targetElement.not($(this)).removeClass('active');
            });
        });
$(document).ready(function(){
    $(".slider .swiper-pagination span").each(function(i){
        $(this).text(i+1).prepend("0");
    });
});
 </script>
@endsection

@section("footerscript")
@endsection
