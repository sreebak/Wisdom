@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')
    <!--=========Banner start============-->
    <div class="inner-pages-bnr">
        <img src="{{ url('assets/images/contact-banner.jpg') }}" class="img-responsive" alt="contact-banner-image">
        <div class="banner-caption">
            <h1>Thank You</h1>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a> - </li>
                <li>Thank You</li>
            </ul>
        </div>
    </div>
    <!--=========Banner end============-->
@endsection
@section('phone1')
{{ $gens->phone1 }}
@endsection

@section('phone2')
{{ $gens->phone2 }}
@endsection

@section('address')
{!! $gens->address !!}
@endsection

@section('email')
{{ $gens->email1 }}
@endsection

@section('website')
{{ $gens->website }}
@endsection

@section('google_map')
{!! $gens->google_map !!}
@endsection

@section("content")

<div class="text-center">
   <p>&nbsp;</p>
   <h4>Thanks we will contact you soon</h4>
</div>

@endsection


@section("footerscript")
@endsection