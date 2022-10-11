@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')
    <!--=========Banner Start============-->
    <div class="inner-pages-bnr">
        <img src="{{ url('assets/images/portfolio-banner.jpg') }}" class="img-responsive" alt="portfolio-banner-image">
        <div class="banner-caption">
            <h1>Projects</h1>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a> - </li>
                <li>Products</li>
            </ul>
        </div>
    </div>
    <!--=========Banner end============-->
@endsection


@section("content")
            
@endsection
@section("footerscript")
@endsection