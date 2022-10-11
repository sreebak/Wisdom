@extends("website.theme.layout")

@section('meta-data')
@if(strlen($thisblog->metatags) <=0)
    <title>{{ $thisblog->blog_title }}</title>
    <meta name="description" content="{{ strip_tags($thisblog->short_description) }}" />
    <meta name="keywords" content="{{ $thisblog->keywords ? $thisblog->keywords : $gens->keywords }}" />
    {!! $gens->metatags !!}
@else
    {!! $thisblog->metatags ? $thisblog->metatags : $gens->metatags !!}
@endif
@endsection

@section('mystyles')
<style>
    .blog_a {
    color: #000;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.blog_img_sub {
    height: 50px;
    border: solid #ccc 1px;
}

.blog_s_img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}
</style>
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
@endsection


@section("content")

<section class="pt-5 pb-5" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-12">
                <h1 class="text-center f_35 pb-2">
                    {{$thisblog->blog_title}}
                </h1>
                <img src="{{asset('storage/blogs/'.$thisblog->image1)}}" alt="" class="img-fluid">
                <div class="row">
                    <div class="col-12">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> <span>{{$thisblog->updated_at->diffForHumans()}}</span>
                    </div>
                </div>

                <p class="pt-2">
                    {!!$thisblog->blog_content!!}
                </p>
            </div>
            <div class="col-md-3  col-sm-12 col-12">
                <div class="">
                    <h3 class="river__header"> <span class="skew-highlight skew-highlight--primary"><span class="unskew-text"> RECENT BLOGS</span></span>
                    </h3>
                    @forelse ($recentblogs as $item)
                        <a href="{{route('showblog',$item->url_slug)}}">
                            <div class="row">
                                <div class="col-4">
                                    <div class="blog_img_sub">
                                        <img src="{{asset('storage/blogs/'.$item->image1)}}" alt="" class=" blog_s_img">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <p class="blog_a">{{$item->blog_title}}</p>
                                </div>
                            </div>
                        </a>
                        <hr>
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section("footerscript")

@endsection
