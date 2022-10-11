@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')

@endsection
{{-- @section('phone1')
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
@endsection--}}

@section("content")
<section class="contact_section mb-5">
    <div class="container">
        <h1 class="texthero__header text-center pb-5">Need some help?</h1>
    </div>
    <div class="container pt-4">
        <div class="row">
            <!-- <div class="col-md-6 col-lg-4 col-sm-6 col-12 text-center pt-5">
                <div>
                   
                    <img src="assets/svg/phone.svg" class="img-fluid pb-3" alt="">
                </div>
                <h2 class="texthero__subheader"> Reach us</h2>
                 <h4>
                    Email: <a href="mailto:{{$gens->email1=='' ? 'info@devopsacadama.com' : $gens->email1}}"> {{$gens->email1=='' ? 'info@devopsacadama.com' : $gens->email1}}</a>
                </h4>
                {{-- <h4>

                    For media: <br><a href="mailto:{{$gens->email2=='' ? 'info@devopsacadama.com' : $gens->email2}}"> {{$gens->email2=='' ? 'info@devopsacadama.com'  :$gens->email2}}</a>
                </h4> --}}
                <h4>
                    {{$gens->address=='' ? 'devops' : $gens->address}}
                </h4>  


                {{-- <a class="r_button r_button--primary mt-3" href="#"> Find an answer</a> --}}
            </div> -->
            <div class="col-md-6 col-lg-6 col-sm-6  col-12 text-center pt-5">
                {{-- <div>
                    <img src="assets/svg/phone.svg" class="img-fluid pb-3" alt="">
                </div>
                <h2 class="texthero__subheader"> Reach us</h2>
                 
                <h4 class="pt-4">
                   
                </h4>
             
                <h4>
                Palladium Business Center, 
                 4 Floor, Al Barsha 1   <br>
                 Al Barsha, Dubai, UAE

                </h4>
                <h4>
                <a href="tel:+97142834688 ">+971 4 2834688 </a>
                </h4>
                <h4>
                <a href="tel:+971565602357 ">+971 565602357 </a>
                </h4>

                 

                <div class="contact_section_btn">
                     
                </div> --}}

                {{-- #### open new 12072022  --}}


                {{-- #### end new 12072022  --}}

                <img src="assets/image/contact-us.webp" alt="contact-us" class="img-fluid">

            </div>
            <div class="col-md-6 col-lg-6 col-sm-6  col-12 text-center pt-5">
            <div>
                    <img src="assets/svg/phone.svg" class="img-fluid pb-3" alt="">
                </div>
                <h2 class="texthero__subheader  "> Contact Us</h2>
                <h4>
                    Email: <a href="mailto:{{$gens->email1=='' ? 'info@devopsacadama.com' : $gens->email1}}"> {{$gens->email1=='' ? 'info@devopsacadama.com' : $gens->email1}}</a>
                </h4>
                {{-- <h4>

                    For media: <br><a href="mailto:{{$gens->email2=='' ? 'info@devopsacadama.com' : $gens->email2}}"> {{$gens->email2=='' ? 'info@devopsacadama.com'  :$gens->email2}}</a>
                </h4> --}}
                <h4>
                    {{$gens->address=='' ? 'devops' : $gens->address}}
                </h4>

                <h4>
                <a href="tel:+914872428119 ">+91 4872428119 </a>
                </h4>
                <h4>
                <a href="tel:+919686680607 ">+91 9686680607 </a>
                </h4>


            </div>
        </div>
    </div>
</section>
@endsection 


@section("footerscript")
@endsection