@extends("website.theme.app")

@section('meta-data')
<title>{{ $gens->webtitle }}</title>
<meta name="description" content="{{ $gens->description }}" />
<meta name="keywords" content="{{ $gens->keywords }}" />
{!! $gens->metatags !!}
@endsection

@section("mystyles")

@endsection

@section('google-analytics')
{!! $gens->google_analy !!}
@endsection

@section('google_map')
{!! $gens->google_map !!}
@endsection


@section("content")

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

@section('facebook')
{{ $gens->facebook }}
@endsection

@section('twitter')
{{ $gens->twitter }}
@endsection

@section('linkedin')
{{ $gens->linkedin }}
@endsection

@section('youtube')
{{ $gens->youtube }}
@endsection

@section('googleplus')
{{ $gens->googleplus }}
@endsection



@section("footerscript")

@endsection