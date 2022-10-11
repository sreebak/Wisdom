@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')
    <!--=========Banner Start============-->
    <div class="inner-pages-bnr">
        <img src="{{ url('assets/images/service-banner.jpg') }}" class="img-responsive" alt="Service-banner-image">
        <div class="banner-caption">
            <h1>Services</h1>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a> - </li>
                <li>Services</li>
            </ul>
        </div>
    </div>
    <!--=========Banner end============-->
@endsection


@section("content")

    <!--=========Services Start============-->
    <section class="pad100-50-top-bottom">
        <div class="container">
            <div class="row ">
                <div class="head-section service-head other-heading">
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                        <h3>OUR services</h3>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                        <p class="fnt-18">Speed Blast, one of the best Sandblasting machine suppliers UAE is providing solution for surface preparation equipment. During& after paints for surface preparation industries and market leader & globalsource for abrasive, blasting, painting, quality control and safty equipment &supplies since 2009.

                        </p>
                    </div>
                </div>

                @foreach($services as $service)
                    <div class="col-md-4 col-sm-4 col-xs-12 marbtm50 service-list-column">
                        <a href="{{ route('showservice',$service->url_slug) }}">
                            <span class="image_hover"> <img src="{{ url('storage/services/'.$service->thump_image) }}" class="img-responsive zoom_img_effect" alt=""></span>
                            <div class="service-heading {{ $service->thump_alt }}">
                                <h5>{{ $service->service_name }}</h5>
                                <span class="read-more-link">Read More</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=========Services end============-->

@endsection

@section("footerscript")
@endsection