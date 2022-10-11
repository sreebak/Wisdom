@extends("website.theme.layout")

@section('meta-data')
@if(strlen($thisproject->metatags) <=0)
    <title>{{ $thisproject->project_name }}</title>
    <meta name="description" content="{{ strip_tags($thisproject->short_description) }}" />
    <meta name="keywords" content="{{ $thisproject->keywords ? $thisproject->keywords : $gens->keywords }}" />
    {!! $gens->metatags !!}
@else
    {!! $thisproject->metatags ? $thisproject->metatags : $gens->metatags !!}
@endif
@endsection

@section('mystyles')

@endsection

@section('address')
{!! $gens->address !!}
@endsection
@section('phone1')
{{ $gens->phone1 }}
@endsection
@section('email')
{{ $gens->email1 }}
@endsection

@section('header-section')
    <!--=========Banner Start============-->
    <div class="inner-pages-bnr">
        <img src="{{ url('assets/images/portfolio-banner.jpg') }}" class="img-responsive" alt="Projects">
        <div class="banner-caption">
            <h1>{{ $thisproject->project_name }}</h1>
            <ul class="breadcumb">
                <li><a href="{{ route('projects') }}">Projects</a> - </li>
                <li>{{ $thisproject->project_name }}</li>
            </ul>
        </div>
    </div>
    <!--=========Banner end============-->
@endsection


@section("content")

    <section class="pad100-top-bottom">
        <div class="container">
            <div class="row">
                <!--=========Servie Right Start============-->
                <div class="col-md-8 right-column">
                    <div class="service-right-desc">
                        <span class="image_hover ">
                            <img src="{{ url('storage/projects/'.$thisproject->image1) }}" class="img-responsive zoom_img_effect" alt="">
                        </span>
                    </div>
                    <div class="section_3 text-justify">
                        {!! $thisproject->long_description !!}
                    </div>
                    <div class="service-detail">
                        <div class="have-queston havequestion_01">
                            <p>Have you any question or query</p>
                            <h3>GET FREE CONSULTATION WITH OUR AGENT
                            </h3>
                            <a data-animation="animated fadeInUp" class="header-requestbtn black-request-btn hvr-bounce-to-right" href="{{ route('contactus') }}">Request A Quote</a>
                        </div>
                    </div>
                </div>
                <!--=========Servie Right end============-->

                <!--=========Servie Left Start============-->
                <div class="col-md-4 left-column">
                    <ul class="category-list">
                        @foreach($recentprojects as $project)
                            <li><a href="{{ route('showproject', $project->url_slug) }}" class="{{ Request::path() === "project/" . $project->url_slug ? " active-category " : "" }}">{{ $project->project_name }}</a></li>
                        @endforeach
                    </ul>
                    <div class="contact-help">
                        <div class="office-info-col wdt-100">
                            <h4>CONTACT US </h4>
                            <ul class="office-information">
                                <li class="office-loc">
                                    <span class="info-txt">@yield('address')</span>
                                </li>
                                <li class="office-phn">
                                    <span class="info-txt fnt_17">@yield('phone1')</span>
                                </li>
                                <li class="office-msg">
                                    <span class="info-txt fnt_17">@yield('email')</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <a class="pdf-button" href="#">DOWNLOAD BROCHURE</a> --}}
                </div>
                <!--=========Servie Left end============-->

            </div>
        </div>
    </section>

@endsection


@section("footerscript")
@endsection
