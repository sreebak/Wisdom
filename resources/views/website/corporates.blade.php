@extends("website.theme.layout")
@section('mystyles')
@endsection

@section('header-section')
@endsection


@section("content")
<!-- main open \\ -->

<div id="allcontent" class="allcontent  ">
    <!-- Start of content snippet ID 585 -->
    <div class="hero v3">
        <main>
            <section>
                <h1>  <em> Get Desired Results, </em>  Boost your Confidence and Career</h1>
                <p>Online Courses on DevOps are available for working professionals at a convenient time</p>
                {{-- <p><a class="r_button r_button--primary" href="#">Let’s chat</a></p> --}}
            </section>
            <aside> <img src="assets/image/cour_banner_img.jpg" data-src="" alt="School MyTutor lesson"> </aside>
        </main>
    </div>
    <!-- End of content snippet ID 585 -->
    <!-- Start of content snippet ID 586 -->
    {{-- <div class="mt-5 container-fluid">
        <div class="reviews-bar row ">
            <div class="reviews-bar__text reviews-bar__text--left col-xl-4 col-12"> Used by {{$homepage->school_count}} schools </div>
            <div class="reviews-bar__text reviews-bar__text--center  col-xl-4 col-12">
                <a href="#">
                    <p> <img src="assets/svg/stars-steps.svg" alt="Stars" /> <span> {{$homepage->review_count}}
                        </span>reviews </p>
                </a>
            </div>
            <div class="reviews-bar__text reviews-bar__text--right  col-xl-4  col-12"> {{$homepage->note_count}} use our study notes </div>
        </div>
    </div> --}}
    <!-- End of content snippet ID 586 -->
    <!-- Start of content snippet ID 587 -->
    <div class="steps steps--noheadline steps--darksnow">
        <div class="grid grid--full grid-flow grid-flow--full-vertical">
            <div class="grid__item one-whole steps__header">
                <!-- <h1> We <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">reinforce
                            classwork</span></span> by matching your students with subject specialist instructor </h1> -->

                            <!-- <h1> We <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">reinforce
                            classwork</span></span> by matching your students with subject specialist instructor </h1> -->

                            <h4>We, at DevOps Academia,  provide <span class="skew-highlight skew-highlight--primary"> <span class="unskew-text"> online courses  </span> </span> to the working professionals at a
                                 time that does not hinder their working hours and is convenient for attending at any time 
                                 suitable.</h4>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-12 col-12">
                    <div>
                        <div class="grid__item  palm--two-twelfths"> <img class="steps__icon"
                                src="assets/svg/one_in_coral_circle.svg"> </div>
                        <div class="grid__item  ">
                            <p class="steps__title cor_he"> Face to Face interaction </p>
                            <p class="steps__summary ">  The working professionals can interact with the online instructors face to face during the live lesson sessions</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12   col-12">
                    <div>
                        <div class="grid__item  palm--two-twelfths"> <img class="steps__icon"
                                src="assets/svg/two_in_coral_circle.svg"> </div>
                        <div class="grid__item  ">
                            <p class="steps__title cor_he">Collaboration</p>
                            <p class="steps__summary "> Collaborate with the other working professionals and instructors for sharing knowledge, documents, and other learning material.  </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12   col-12">
                    <div>
                        <div class="grid__item  palm--two-twelfths"> <img class="steps__icon"
                                src="assets/svg/three_in_coral_circle.svg"> </div>
                        <div class="grid__item  ">
                            <p class="steps__title cor_he">Recorded Lessons</p>
                            <p class="steps__summary "> Without interrupting your daily working timings, you can re-watch the recorded lessons at any time as per your convenience. </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- End of content snippet ID 587 -->
    <!-- Start of content snippet ID 588 -->
      {{-- START FEATURES  --}}

      @forelse ($features as $key=>$feature)
      <div class="container-fluid">
        <div class="{{ $key%2==0 ? 'grid--rev' : ''}} row">
            <div class="grid-flow__item  col-md-6 col-12 col-sm-12">
                <picture>
                    <source src="{{asset('storage/services/'.$feature->image1) }}" media="(max-width: 768px)">
                    <source src="{{asset('storage/services/'.$feature->image1) }}"> <img src="{{asset('storage/services/'.$feature->image1) }}" width="100%"
                        alt="tutor-bg.jpg"> </picture>
            </div>
            <div class="grid-flow__item col-md-6 col-12 col-sm-12 align-self-center">

                <div class="grid__item desk--five-sixths portable--five-sixths lap--">
                    <h3 class="river__header">{{ $feature->service_name }}  <span class="skew-highlight skew-highlight--primary">
                            <span class="unskew-text">{{ $feature->short_description }}</span> </span></h3>
                    <p class="river__paragraph"> {!! $feature->long_description !!} </p>
                </div>

            </div>
        </div>
    </div>

          
      @empty
      <div class="container-fluid">
        <div class=" grid--rev row">
            <div class="grid-flow__item  col-md-6 col-12 col-sm-12">
                <picture>
                    <source src="assets/image/tutor-mobile-bg.jpg" media="(max-width: 768px)">
                    <source src="assets/image/tutor-bg.jpg"> <img src="assets/image/tutor-bg.jpg" width="100%"
                        alt="tutor-bg.jpg"> </picture>
            </div>
            <div class="grid-flow__item col-md-6 col-12 col-sm-12 align-self-center">

                <div class="grid__item desk--five-sixths portable--five-sixths lap--">
                    <!-- <h3 class="river__header"> Meet instructor for <span class="skew-highlight skew-highlight--primary">
                            <span class="unskew-text"> free </span> </span> before you book </h3> -->

                      


                            <h3 class="river__header"> Meet with our Instructor for  <span class="skew-highlight skew-highlight--primary">
                            <span class="unskew-text"> free </span> </span> Counselling</h3>

                    <p class="river__paragraph"> 
                    Before you plan for taking admission in the DevOps certification training course online, we suggest you discuss your plans and know more about the course content by speaking with our instructors. 
                    </p>
                </div>

            </div>
        </div>
    </div>

      @endforelse

    {{-- <div class="container-fluid">
        <div class=" grid--rev row">
            <div class="grid-flow__item  col-md-6 col-12 col-sm-12">
                <picture>
                    <source src="assets/image/tutor-mobile-bg.jpg" media="(max-width: 768px)">
                    <source src="assets/image/tutor-bg.jpg"> <img src="assets/image/tutor-bg.jpg" width="100%"
                        alt="tutor-bg.jpg"> </picture>
            </div>
            <div class="grid-flow__item col-md-6 col-12 col-sm-12 align-self-center">

                <div class="grid__item desk--five-sixths portable--five-sixths lap--">
                    <h3 class="river__header"> Meet tutors for <span class="skew-highlight skew-highlight--primary">
                            <span class="unskew-text"> free </span> </span> before you book </h3>
                    <p class="river__paragraph"> When you find a tutor you like, book a 15-minute meeting to ask
                        questions, find out about their teaching style - and make sure they’re someone your child will
                        get on with.</p>
                </div>

            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="grid-flow__item col-md-6 col-sm-12 col-12">
                <picture>
                    <!-- <source src="assets/image/online_school_welcome.jpg" media="(max-width: 768px)"> -->
                    <source src="assets/image/prices-03.jpg"> <img src="assets/image/prices-03.jpg" class="img-fluid"
                        alt="prices-03.jpg"> </picture>
            </div>
            <div class="grid-flow__item col-md-6 col-sm-12 col-12 pt-md-5 align-self-center">
                <div class="grid grid--full grid--right">
                    <div class="grid__item desk--five-sixths portable--five-sixths lap--">
                        <h3 class="river__header"> You’ll only pay for what you use</h3>
                        <p class="river__paragraph"> With MyTutor, you won’t pay anything until you’ve found a great
                            tutor, had a chat with them and booked your first lesson. No sign up fees. No subscriptions.
                            Just plain pay-as-you-go.</p>
                    </div>
                </div>






            </div>
        </div>
    </div> --}}

{{-- END FEATURES --}}

    <div class="grid-flow__background--teal container-fluid">
        <div class="row">
            <div class="col-sm-6 col-12 pt-5 pb-5 align-self-center">
                <picture>
                    <source src="assets/image/png/trusted_by_institutions_1.png" media="(max-width: 768px)">
                    <source src="assets/image/png/trusted_by_institutions_1.png"> <img
                        src="assets/image/png/trusted_by_institutions_1.png" width="100%" alt="trusted by schools">
                </picture>
            </div>
            <div class=" col-sm-6 col-12 pt-5 pb-5 align-self-center">
                <div class="grid grid--full grid--right">
                    <div class="grid__item  portable--five-sixths ">
                        <h3 class="river__header"> <span class="skew-highlight skew-highlight--accent"><span>Instructor
                                    perspective</span></span>
                        </h3>
                        <p class="river__paragraph river__paragraph--light"> “We’re seeing some fantastic results
                            through My instructor. Students that come through the programme develop their self-confidence and
                            self-esteem, become more independent, and their grades improve.” <br><br> <strong>Lee
                                Berrill, Raising Standards Lead, Weston Favell Academy</strong> </p> 
                                {{-- <a
                            class="r_button  r_button--primary" href="#"> Read our case studies </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>







    <div class="steps container-fluid">

        <h2 class="text-center pb-5">
            Some of our amazing partners
        </h2>
        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12  text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center"><img class="img-fluid h-50 img_grayscale"
                    src="assets/image/png/djanogly.png"></div>

        </div>
    </div>

    <!-- carousel opening\\ -->


    <!-- carousel end// -->

    <div class="container-fluid">

        <div class="actionbanner actionbanner--short">
            <div class="actionbanner__wrapper">
                <h2 class="actionbanner__header"> Speak to a instructor and get courses sorted today </h2> 
                <button type="button" class=" r_button r_button--primary mb-5" data-toggle="modal"
                data-target="#contactModal" onclick="return $('#contact-form')[0].reset()">
                <span class="ui-button-text ui-c ">SPEAK TO DEVOPS EXPERTS</span>
            </button>
                {{-- <a
                    class="r_button r_button--primary" href="find-a-tutor.html"> Find a tutor </a> --}}
            </div>
        </div>

    </div>


</div>


<!-- main end  -->
@endsection

@section("footerscript")
@endsection
