@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')
    <!--=========Banner Start============-->
    <div class="inner-pages-bnr">
        <img src="{{ url('assets/images/portfolio-banner.jpg') }}" class="img-responsive" alt="portfolio-banner-image">
        <div class="banner-caption">
            <h1>Products</h1>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a> - </li>
                <li>Products</li>
            </ul>
        </div>
    </div>
    <!--=========Banner end============-->
@endsection


@section("content")
    <div class="filter-section">
        <div class="col-sm-12 col-xs-12">
            <div class="filter-container isotopeFilters">
                <ul class="list-inline filter">
                    <li class="active"><a href="#" data-filter="*">All Products</a></li>
                    @foreach($products_catg as $catg)
                        <li class="cat-item cat-item-1"> <a href="#" data-filter=".{{ $catg->url_slug }}">{{ $catg->catg_name}}</a> </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <section class="portfoio-section3">
        <!-- /nimble-portfolio-filter -->
        <div class="container">
            <div class="portfolio-section port-col project_classic portfolio-3">
                <div class="isotopeContainer">

                    @foreach($products as $prod)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 img mbot30 isotopeSelector {{ $prod->categories->url_slug }} ">
                        <div class="grid">
                            <div class="image-zoom-on-hover">
                                <div class="gal-item">
                                    <a class="black-hover" href="{{ route('showproduct',$prod->url_slug) }}">
                                        <img class="img-full img-responsive" src="{{ url('storage/products/' . $prod->thump_image ) }}" alt="$prod->thump_alt">
                                        <div class="tour-layer delay-1"></div>
                                        <div class="vertical-align">
                                            <div class="border">
                                                <h5>{{ $prod->product_name }}</h5>
                                            </div>
                                            <div class="view-all hvr-bounce-to-right slide_learn_btn view_project_btn"><span>View Product</span></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    
                    
                </div>
            </div>
            <!-- /nimble-portfolio -->
        </div>
    </section>            
@endsection

@section("footerscript")
@endsection