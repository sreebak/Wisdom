@extends("website.theme.layout")
@section('mystyles')
@endsection

@section('header-section')
@endsection


@section("content")
<div id="allcontent" class="allcontent  ">





    <!-- Start of content snippet ID 93 (pricing_12082015) -->
    <div class="hero v3">
        <main>
            <section>
                <h1>Are you devops Expert ?<br>
                    Work on your terms.
                    <br> Become an <em>online Instructor.</em>
                </h1>
                <p>
                    Flexible, fulfilling and fits into your schedule
                </p>
                {{-- <a class="r_button r_button--primary max_width_160" href="#"> APPLY NOW </a> --}}
            </section>
            <aside> <img src="assets/image/cour_banner_img.jpg" data-src="assets/image/become-a-tutor.jpg"
                    alt="prices-01.jpg"> </aside>
        </main>
    </div>
    <!-- End of content snippet ID 93 (pricing_12082015) -->



    <span class="why_online_tutoring">
        <!-- Start of content  -->
        <div class=" steps steps--noheadline steps--darksnow container-fluid">
            <div class="actionbanner grid grid--middle  grid--full row pb-5 ">
                <div class="grid__item desk--one-whole col-12">
                    <h1>Why online instructor?</h1>
                    <h4 class="text_blue">
                        We help you get regular, flexible work by making it easy to find online instructor jobs.
                    </h4>
                </div>
            </div>
            <div class="grid grid--full  grid-flow--full-vertical row">
                <div
                    class="grid__item desk--one-third portable--one-third lap--one-third palm--one-whole col-md-4 col-sm-12 col-12">
                    <p class="steps__title">Rewarding</p>
                    <p class="steps__summary steps__summary--slate text-justify">Get the best in the industry compensation without leaving your current job or workplace. Join at any time without disturbing your present job roles and responsibilities. Teach online in your spare time by devoting as many hours as you can. </p>
                </div>
                <div
                    class="grid__item desk--one-third portable--one-third lap--one-third palm--one-whole col-md-4 col-sm-12 col-12">
                    <p class="steps__title">Flexible Hours</p>
                    <p class="steps__summary steps__summary--slate text-justify">This is not any other monotonous ‘9 to 5 job’, where you need to spend rigid 8 to 10 hours at the workplace. You can spend as many hours of teaching online lessons to the students as you can devote ranging from 1 hour to 8 hours a day as per your availability irrespective of day or night.</p>
                </div>
                <div
                    class="grid__item desk--one-third portable--one-third lap--one-third palm--one-whole col-md-4 col-sm-12 col-12">
                    <p class="steps__title"> Well Paid  </p>
                    <p class="steps__summary steps__summary--slate text-justify"> You get to earn an attractive amount of £10 per hour devoted to teaching the students online. Moreover, you need to spend a single penny on travelling since this is a remote job. </p>
                </div>

            </div>
        </div>
        <!-- End of content  -->
    </span>

    @forelse ($features as $key=>$feature)
    <span>

        <div class="container-fluid">
            <div class="{{ $key%2==0 ? 'grid--rev' : ''}} row">
                <div class="grid-flow__item col-md-6 col-sm-12 col-12">
                    <picture>
                       
                        <source src="{{asset('storage/services/'.$feature->image1) }}"> <img
                            src="{{asset('storage/services/'.$feature->image1) }}" class="img-fluid"
                            alt={{asset('storage/services/'.$feature->image1) }}"> </picture>
                </div>
                <div class="grid-flow__item col-md-6 col-sm-12 col-12 pt-md-5 align-self-center">
                    <div class="grid grid--full grid--right">
                        <div class="grid__item desk--five-sixths portable--five-sixths lap--">
                            <h3 class="river__header">{{ $feature->service_name }} <span
                                    class="skew-highlight skew-highlight--primary"> <span class="unskew-text">
                                        {{ $feature->short_description }}</span> </span>
                            </h3>
                            <p class="river__paragraph"> {!! $feature->long_description !!} </p>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </span>

    @empty

    <!-- <span>

        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="grid-flow__item col-md-6 col-sm-12 col-12">
                    <picture>
                      
                        <source src="assets/image/role_model.png"> <img src="assets/image/role_model.png"
                            class="img-fluid" alt="prices-03.jpg"> </picture>
                </div>
                <div class="grid-flow__item col-md-6 col-sm-12 col-12 pt-md-5 align-self-center">
                    <div class="grid grid--full grid--right">
                        <div class="grid__item desk--five-sixths portable--five-sixths lap--">
                            <h3 class="river__header"> Be a <span class="skew-highlight skew-highlight--primary"> <span
                                        class="unskew-text"> role model</span> </span> to<br>kids who really need<br>it
                            </h3>
                            <p class="river__paragraph"> Through our brilliant schools programmes, you can work with
                                disadvantaged students who otherwise wouldn’t be able to afford one-to-one instructions.
                                You’ll be making a real difference to their lives – and clocking in some serious karma
                                points.</p>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </span> -->
    @endforelse

    <div class="reviewpanel bg_sky_blue reviewpanel--trustpilot footer_cu ">


        <div class="container-fluid">
            <div class="row row--no-mobile-max-width">
                <div class="column-12 column-12-s">
                    <h1 class="text-center font-weight-bold text_blue pt-5 pb-4">
                        WHAT OUR INSTRUCTOR SAY ABOUT US
                    </h1>
                </div>
            </div>
        </div>

        <div class="reviewpanel__wrapper slick2016" id="js-homeslickreviews">

            <div class=" reviewpanel__card reviewpanel__card_01 ">

                <div class=" reviewpanel__tutorwrapper"><img class="reviewpanel__avatar"
                        src="assets/image/review_001.jpg">
                    <div class="reviewpanel__meta">
                        <p class="reviewpanel__tutor">Selin B</p>
                        <p class="reviewpanel__university pb-0 mb-0">York University</p>
                        <p class="reviewpanel__subject">102 Languages lessons</p>
                    </div>
                </div>

                <p class="reviewpanel__sessioncount  pt-2 "><img src="assets/svg/stars--reviewcard.svg"></p>
                <p class="reviewpanel__bio pt-2 text-center ">"Working for My instructor gives me flexible working hours, as
                    well as teaching subjects which I study at my degree, all from the comfort of my home. I could quite
                    happily say My instructor is the perfect student job!"</p>
            </div>
            <div class=" reviewpanel__card reviewpanel__card_01 ">

                <div class=" reviewpanel__tutorwrapper"><img class="reviewpanel__avatar"
                        src="assets/image/review_001.jpg">
                    <div class="reviewpanel__meta">
                        <p class="reviewpanel__tutor">Selin B</p>
                        <p class="reviewpanel__university pb-0 mb-0">York University</p>
                        <p class="reviewpanel__subject">102 Languages lessons</p>
                    </div>
                </div>

                <p class="reviewpanel__sessioncount  pt-2 "><img src="assets/svg/stars--reviewcard.svg"></p>
                <p class="reviewpanel__bio pt-2 text-center ">"Working for My Instructor gives me flexible working hours, as
                    well as teaching subjects which I study at my degree, all from the comfort of my home. I could quite
                    happily say My Instructor is the perfect student job!"</p>
            </div>
            <div class=" reviewpanel__card reviewpanel__card_01 ">

                <div class=" reviewpanel__tutorwrapper"><img class="reviewpanel__avatar"
                        src="assets/image/review_001.jpg">
                    <div class="reviewpanel__meta">
                        <p class="reviewpanel__tutor">Selin B</p>
                        <p class="reviewpanel__university pb-0 mb-0">York University</p>
                        <p class="reviewpanel__subject">102 Languages lessons</p>
                    </div>
                </div>

                <p class="reviewpanel__sessioncount  pt-2 "><img src="assets/svg/stars--reviewcard.svg"></p>
                <p class="reviewpanel__bio pt-2 text-center ">"Working for My Instructor gives me flexible working hours, as
                    well as teaching subjects which I study at my degree, all from the comfort of my home. I could quite
                    happily say My Instructor is the perfect student job!"</p>
            </div>
            <div class=" reviewpanel__card reviewpanel__card_01 ">

                <div class=" reviewpanel__tutorwrapper"><img class="reviewpanel__avatar"
                        src="assets/image/review_001.jpg">
                    <div class="reviewpanel__meta">
                        <p class="reviewpanel__tutor">Selin B</p>
                        <p class="reviewpanel__university pb-0 mb-0">York University</p>
                        <p class="reviewpanel__subject">102 Languages lessons</p>
                    </div>
                </div>

                <p class="reviewpanel__sessioncount  pt-2 "><img src="assets/svg/stars--reviewcard.svg"></p>
                <p class="reviewpanel__bio pt-2 text-center ">"Working for My Instructor  gives me flexible working hours, as
                    well as teaching subjects which I study at my degree, all from the comfort of my home. I could quite
                    happily say My Instructor  is the perfect student job!"</p>
            </div>
        </div>

        <div class="text-center pb-4">
            {{-- <a class="r_button r_button--primary" href="#"> APPLY NOW</a> --}}
        </div>


    </div>



</div>
@endsection

@section("footerscript")

<script>
    $(document).ready(function () {
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
    $(document).ready(function () {
        var a = $(".riverreviewcarousel__item");
        $("#js-riverreviewcarousel--previous").click(function () {
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
                $("#js-riverreviewcarousel-1").addClass("riverreviewcarousel__item--next")
            } else {
                $("#js-riverreviewcarousel-" + b).addClass("riverreviewcarousel__item--next")
            }
        });
        $("#js-riverreviewcarousel--next").click(function () {
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
                $("#js-riverreviewcarousel-" + a.length).addClass("riverreviewcarousel__item--previous")
            } else {
                $("#js-riverreviewcarousel-" + c).addClass("riverreviewcarousel__item--previous")
            }
        })
    });
</script>
@endsection