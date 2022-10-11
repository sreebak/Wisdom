@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')

@endsection


@section("content")
<!-- main open \\ -->
<section class=" family_section_01 ">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-12">
                <h1 class="river__header ">Our Stories for <span class="skew-highlight skew-highlight--primary"> <span
                            class="unskew-text"> Career seekers</span> </span>
                </h1>
                <h5>
                    A regularly updated selection of blog articles to support your teaching
                </h5>
            </div>
            <div class="col-sm-4 col-12 text-center">
                <img src="assets/image/blog_p_page.png">
            </div>
            {{-- <div class="col-sm-6 col-12">
                <form action="#">
                    <label for=" ">Category</label>
                    <select name=" " id="#">
                        <option value=" ">All</option>
                        <option value="  ">
                            A Level </option>
                        <option value="  ">Admissions</option>
                        <option value=" ">Adult Education </option>
                    </select>
                    <br><br>
                </form>

            </div>

            <div class="col-sm-6 col-12">

                <div class="search-container_my">
                    <form action="#">
                        <label for=" ">Search</label>
                        <input type="text" placeholder="Search.." class="family_guid_search" style="    margin-top: 0;"
                            name="search">
                        <button class="search_btn" type="submit">Search</button>
                    </form>
                </div>

            </div> --}}
        </div>
    </div>
</section>
{{-- @dump($blogs) --}}
<section class=" family_section_02">
    <div class="container" style=" background-color: #F5F6F7;">
        @if(count($blogs)>0)
        @php
        $firstblog=$blogs->first();
        @endphp
        <div class="mt-4 mb-4 ">
            <div class="family_section_box p-5">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center">
                        <img src="{{asset('storage/blogs/'.$firstblog->thump_image) }}" class="img-fluid">
                    </div>

                    <div class="col-12 col-sm-6 align-self-center">
                        <label>{{$firstblog->created_at->diffForHumans()}}</label>
                        <h3>
                            {{ $firstblog->blog_title }}
                        </h3>
                        <p>
                            {{ $firstblog->short_description }}
                        </p>

                        <a href="{{route('showblog',$firstblog->url_slug)}}">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row row_myt">
            @if (count($blogs)>1)
                @forelse ($blogs as $key=>$item)
                    @if ($key>0)
                    <div class="col-sm-4 col-12 row_col_myt">
                        <div class="famil_guid_box_01" style="background-color: white;">
                            <div class="family_gu_imgbox">
                                <img src="{{asset('storage/blogs/'.$item->thump_image) }}" class="img-fluid">
                            </div>
                            <h6>
                                {{$item->blog_title }}
                            </h6>
                            <label>{{$item->created_at->diffForHumans()}}</label>

                            <p>
                                {{ $item->short_description }}
                            </p>
                            <a href="{{route('showblog',$item->url_slug)}}">
                                Read More
                            </a>
                        </div>
                    </div>
                    @endif
                @empty
                    <div class="col-sm-4 col-12 row_col_myt">
                        <div class="famil_guid_box_01" style="background-color: white;">
                            <div class="family_gu_imgbox">
                                {{-- <img src="{{asset('storage/blogs/'.$item->thump_image) }}" class="img-fluid"> --}}
                            </div>
                            <h6>
                                No Blog
                            </h6>
                            <label>--</label>

                            <p>
                                No data
                            </p>
                            <a href="#">
                                MYTUTOR FOR PARENTS
                            </a>
                        </div>
                    </div>
                @endforelse
            @endif
        </div>


        {{-- <div class=" col-12 text-center mt-5">
            <a class="r_button r_button--primary" href="#"> Load More </a>
        </div> --}}

        <div class=" col-12 text-center mt-5">
            <ul class="family_social_icon">
                <li>
                    <a href="{{$gens->facebook==''?'javascript:void(0)':$gens->facebook}}">
                        <img src="{{asset('assets/svg/facebook.svg')}}">
                    </a>
                </li>
                <li>
                    <a href="{{$gens->twitter==''?'javascript:void(0)':$gens->twitter }}">
                        <img src="{{asset('assets/svg/instagram.svg')}}">
                    </a>
                </li>
                <li>
                    <a href="https://api.whatsapp.com/send?phone=918089520038">
                        <img src="{{asset('assets/svg/whatsapp.svg')}}">
                    </a>
                </li>

                <li>
                    <a href="{{$gens->linkedin==''?'javascript:void(0)':$gens->linkedin}}">
                        <img src="{{asset('assets/svg/linkedin.svg')}}">
                    </a>
                </li>
            </ul>
        </div>


    </div>
</section>

<!-- main end  -->




@endsection

@section("footerscript")
@endsection
