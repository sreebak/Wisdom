@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')
<section>
    <div>
        <img src="{{ asset('assets/image/about_us_page_banner.jpg') }}" class="img-fluid w-100">
    </div>
</section>
@endsection


@section("content")
{{-- <section>
    <div class="mt-5 container-fluid">
        <div class="reviews-bar row ">
            <div class="reviews-bar__text reviews-bar__text--left col-xl-4 col-12"> Used by
                {{$homepage->school_count}}Career Seekers </div>
            <div class="reviews-bar__text reviews-bar__text--center  col-xl-4 col-12">
                <a href="#">
                    <p> <img src="assets/svg/stars-steps.svg" alt="Stars"> <span> {{$homepage->review_count}} reviews
                        </span> </p>
                </a>
            </div>
            <div class="reviews-bar__text reviews-bar__text--right  col-xl-4  col-12"> {{$homepage->note_count}} use our
                study notes </div>
        </div>
    </div>
</section> --}}

<section>
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12 align-self-center">
                <h3 class="river__header"> The problem with tuition</h3>
                <p class="river__paragraph">
                    One-to-one tuition is proven to be one of the best ways to improve grades. And grades are directly
                    linked to life chances and career progression. But until now, tuition has been out of reach for most
                    families – it was too expensive, availability was low,
                    or it relied on living near a good tutor.
                </p>
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <img src="assets/image/about_02.jpg" class="img-fluid">

            </div>
        </div>



        <div class="row flex-row-reverse">
            <div class="col-md-6 col-sm-12 col-12 align-self-center">
                <h3 class="river__header"> The problem with tuition</h3>
                <p class="river__paragraph">
                    One-to-one tuition is proven to be one of the best ways to improve grades. And grades are directly
                    linked to life chances and career progression. But until now, tuition has been out of reach for most
                    families – it was too expensive, availability was low,
                    or it relied on living near a good tutor.
                </p>
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <img src="assets/image/about-03.jpg" class="img-fluid">

            </div>
        </div>
    </div> --}}

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
        <div class="grid--rev row">
            <div class="grid-flow__item col-xl-6 col-lg-6 col-md "> <img src="assets/image/onlinetutor.png"
                    data-src="assets/image/onlinetutor.png" width="100%" alt="Online lessons" /> </div>
            <div class="grid-flow__item   col-xl-6 col-lg-6 col-md align-self-center ">
                <div class="grid grid--full pt-5">
                    <div class=" desk--five-sixths portable--five-sixths lap--one-whole">
                        <h3 class="river__header">Personalized <span
                                class="skew-highlight skew-highlight--primary"><span class="unskew-text">
                                    learning</span></span>
                        </h3>
                        <p class="river__paragraph"> Choose from over 30 subjects to keep your child learning from home.
                            They can learn fun new topics, revise old ones, and be guided through by friendly subject
                            experts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforelse
</section>


<section class="pt-5 pb-4">
{{-- 
    <h3 class="river__header text-center"> Who we are</h3>
    <div class="row">
        <div class="col-12 col-lg-2">
        </div>
        <div class="col-12 col-lg-8">
            <h5 class="text-center ">
                Our founders have combined three unique perspectives to tackle our mission. Robert, a parent frustrated
                by how hard it was to find a tutor for his daughters. Bertie, an analyst who wanted to take an
                evidence-led approach to solving some of the education
                sector’s biggest challenges, and James, an entrepreneur passionate about helping disadvantaged children
                do better at school.
            </h5>
        </div>
        <div class="col-12 col-lg-2">
        </div>
    </div> --}}
</section>






<!-- img open -->



{{-- <div class="row">
    <div class="column-12">
        <div class="team__grid">
            <div class="team__grid__card team__grid__card--title">
                <p>Board</p> <img src="assets/svg/direction.svg">
            </div>
            <div class="team__grid__wrapper" id="robertGrabinerWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--robert-grabiner-500"
                    id="robertGrabiner">
                    <p>Robert Grabiner</p>
                </div>
                <div class="team__grid__info" id="robertGrabinerInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>Robert Grabiner</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__grid__wrapper" id="anneMarieHubyWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--anne-marie-huby-500"
                    id="anneMarieHuby">
                    <p>Anne-Marie Huby</p>
                </div>
                <div class="team__grid__info" id="anneMarieHubyInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>Anne-Marie Huby</p>
                            <p> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__grid__wrapper" id="mattMWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--matt-m-500" id="mattM">
                    <p>Matthew Mead</p>
                </div>
                <div class="team__grid__info" id="mattMInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>Matthew Mead</p>
                            <p> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__grid__wrapper" id="StephenWWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--stephen-w-500"
                    id="StephenW">
                    <p>Stephen Welton</p>
                </div>
                <div class="team__grid__info" id="StephenWInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>Stephen Welton</p>
                            <p> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__grid__wrapper" id="stephenGrabinerWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--stephen-grabiner-500"
                    id="stephenGrabiner">
                    <p>Stephen Grabiner</p>
                </div>
                <div class="team__grid__info" id="stephenGrabinerInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>Stephen Grabiner</p>
                            <p> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__grid__card team__grid__card--title">
                <p>Leadership Team</p> <img src="assets/svg/direction.svg">
            </div>
            <div class="team__grid__wrapper" id="bertieHubbardWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--bertie-hubbard-500"
                    id="bertieHubbard">
                    <p>Bertie Hubbard</p>
                </div>
                <div class="team__grid__info" id="bertieHubbardInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>Bertie Hubbard</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__grid__wrapper" id="jamesGrantWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--james-grant-500"
                    id="jamesGrant">
                    <p>James Grant</p>
                </div>
                <div class="team__grid__info" id="jamesGrantInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>James Grant</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__grid__wrapper" id="nicolaAndersonWrapper">
                <div class="team__grid__card team__grid__card--person js-teamgrid-open employee--nicola-anderson-500"
                    id="nicolaAnderson">
                    <p>Nicola Anderson</p>
                </div>
                <div class="team__grid__info" id="nicolaAndersonInfo">
                    <div class="row">
                        <div class="column-12"> <a class="js-teamgrid-close">x</a>
                            <p>Nicola Anderson</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}
<!-- img end -->

<section class=" about_foot_section pt-5 pb-5">
    <div class="row">
        <div class="col-12 text-center">
            <img src="assets/image/home_about.png" class="img-fluid" alt="">

            <h3 class="river__header"> We’re hiring! Come join our team</h3>
            <h5>
                We’re a growing team of parents, experts, instructors  , and we’re going from strength to
                strength.
            </h5>
            {{-- <a class="r_button r_button--primary mb-5 mt-5" href="find-a-tutor.html">View Careers </a> --}}
        </div>
    </div>
</section>
<!-- main end  -->



@endsection

@section("footerscript")
@endsection
