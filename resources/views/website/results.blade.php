@extends("website.theme.layout")


@section('header-section')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">



@section('mystyles')
<style>
 
 h2{color:#fff;margin-bottom:40px;text-align:center;font-weight:100;}
.demo-gallery > ul {
  margin-bottom: 0;
}
.demo-gallery > ul > li {
    float: left;
    margin-bottom: 15px; 
}
.demo-gallery > ul > li a { 
  border: 3px solid #FFF;
  border-radius: 3px ;
  display: block;
  overflow: hidden;
  position: relative;
  float: left;
  border: solid 2px;

}
.demo-gallery > ul > li a > img {
  -webkit-transition: -webkit-transform 0.15s ease 0s;
  -moz-transition: -moz-transform 0.15s ease 0s;
  -o-transition: -o-transform 0.15s ease 0s;
  transition: transform 0.15s ease 0s;
  -webkit-transform: scale3d(1, 1, 1);
  transform: scale3d(1, 1, 1);
  height: 100%;
  width: 100%;
}
/* me .demo-gallery > ul > li a:hover > img {
  -webkit-transform: scale3d(1.1, 1.1, 1.1);
  transform: scale3d(1.1, 1.1, 1.1);
} */
.demo-gallery > ul > li a:hover .demo-gallery-poster > img {
  opacity: 1;
}
.demo-gallery > ul > li a .demo-gallery-poster {
  background-color: rgba(0, 0, 0, 0.1);
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  -webkit-transition: background-color 0.15s ease 0s;
  -o-transition: background-color 0.15s ease 0s;
  transition: background-color 0.15s ease 0s;
}
.demo-gallery > ul > li a .demo-gallery-poster > img {
  left: 50%;
  margin-left: -10px;
  margin-top: -10px;
  opacity: 0;
  position: absolute;
  top: 50%;
  -webkit-transition: opacity 0.3s ease 0s;
  -o-transition: opacity 0.3s ease 0s;
  transition: opacity 0.3s ease 0s;
}
.demo-gallery > ul > li a:hover .demo-gallery-poster {
  background-color: rgba(0, 0, 0, 0.5);
}
.demo-gallery .justified-gallery > a > img {
  -webkit-transition: -webkit-transform 0.15s ease 0s;
  -moz-transition: -moz-transform 0.15s ease 0s;
  -o-transition: -o-transform 0.15s ease 0s;
  transition: transform 0.15s ease 0s;
  -webkit-transform: scale3d(1, 1, 1);
  transform: scale3d(1, 1, 1);
  height: 100%;
  width: 100%;
}
.demo-gallery .justified-gallery > a:hover > img {
  -webkit-transform: scale3d(1.1, 1.1, 1.1);
  transform: scale3d(1.1, 1.1, 1.1);
}
.demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
  opacity: 1;
}
.demo-gallery .justified-gallery > a .demo-gallery-poster {
  background-color: rgba(0, 0, 0, 0.1);
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  -webkit-transition: background-color 0.15s ease 0s;
  -o-transition: background-color 0.15s ease 0s;
  transition: background-color 0.15s ease 0s;
}
.demo-gallery .justified-gallery > a .demo-gallery-poster > img {
  left: 50%;
  margin-left: -10px;
  margin-top: -10px;
  opacity: 0;
  position: absolute;
  top: 50%;
  -webkit-transition: opacity 0.3s ease 0s;
  -o-transition: opacity 0.3s ease 0s;
  transition: opacity 0.3s ease 0s;
}
.demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
  background-color: rgba(0, 0, 0, 0.5);
}
.demo-gallery .video .demo-gallery-poster img {
  height: 48px;
  margin-left: -24px;
  margin-top: -24px;
  opacity: 0.8;
  width: 48px;
}
.demo-gallery.dark > ul > li a {
  border: 3px solid #04070a;
}
.home .demo-gallery {
  padding:10px 0px 80px 0px; 
}
span#lg-share {
    display: none;
}


/* ##############  */
.containerr {
  position: relative; 
}

.imagee {
  display: block;
  width: 100%;
  height: auto;
}

.overlayy {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008cbab5;
}

.containerr:hover .overlayy {
  opacity: 1;
}

.textt {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

.Res_table a{
  background: #0755a2;
    color: white;
    padding: 6px 8px;
    border-radius: 5px;
}
</style>
@endsection
@section('header-section')
<section>
    <!-- <div>
        <img src="{{ asset('assets/image/about_us_page_banner.jpg') }}" class="img-fluid w-100">
    </div> -->
    <!-- Start of content snippet ID 93 (pricing_12082015) -->
    <div class="hero v3">
        <main>
            <section>
                <h1> Results
                  <em>   2022 </em>
                </h1>
                <!-- <p>
                    Flexible, fulfilling and fits into your schedule
                </p> -->
                <!-- {{-- <a class="r_button r_button--primary max_width_160" href="#"> APPLY NOW </a> --}} -->
            </section>
            <aside> <img src="assets/image/become-a-tutor.jpg" data-src="assets/image/become-a-tutor.jpg"
                    alt="prices-01.jpg"> </aside>
        </main>
    </div>
    <!-- End of content snippet ID 93 (pricing_12082015) -->
</section>
@endsection





@section("content")
 
<section class="pt-5 pb-5">
   <div class="container">
    <div class="table-responsive"> 
      <table class="table table-striped Res_table">
        <thead>
          <tr>
            <th colspan="3" scope="col">
              <h3 class="river__header text-center"> Latest -<span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
                Results  </span></span> 
             </h3>  
            </th> 
          </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $result->title }}</td>
            <td><a href="{{ url('storage/results/'.$result->file) }}" download>Download</a></td> 
          </tr>
        @endforeach
          
        </tbody>
      </table>

    </div>
   </div>
</section>
 
<section>
 
  
  
    <!-- <div class="home"> 
      <div class="container" style="margin-top:40px;">
        

        <h3 class="river__header text-center"> NEET UG  <span class="skew-highlight skew-highlight--primary"><span class="unskew-text">
          Results </span></span> 
       </h3>
       
          <div class="demo-gallery">
              <ul id="lightgallery" class="list-unstyled row">
                  <li class="col-12  col-sm-6 col-md-4 col-lg-4 mt-3 containerr " data-responsive="assets/image/re/resu.webp" data-src="assets/image/re/resu.webp">
                      <a href="">

                          <img class="img-responsive imagee " src="assets/image/re/resu.webp">
                          <div class="overlayy">
                            <div class="textt"> Download results </div>
                          </div>
                      </a>
                     
                  </li>
                  <li class="col-12  col-sm-6 col-md-4 col-lg-4 mt-3 containerr " data-responsive="assets/image/re/res2.webp" data-src="assets/image/re/res2.webp">
                    <a href="">

                        <img class="img-responsive imagee " src="assets/image/re/res2.webp">
                        <div class="overlayy">
                          <div class="textt"> Download results </div>
                        </div>
                    </a>
                   
                </li>

                <li class="col-12  col-sm-6 col-md-4 col-lg-4 mt-3 containerr " data-responsive="assets/image/re/resu.webp" data-src="assets/image/re/resu.webp">
                  <a href="">

                      <img class="img-responsive imagee " src="assets/image/re/resu.webp">
                      <div class="overlayy">
                        <div class="textt"> Download results </div>
                      </div>
                  </a>
                 
              </li>

             </ul>
          </div>
        </div>
      </div>
    {{-- <div class="row">
      <div class="col-12 col-md-4">
        sds
      </div>
      <div class="col-12 col-md-4">
        sds
      </div>
      <div class="col-12 col-md-4">
        sds
      </div>
    </div> --}}
  </div> -->
</section>

 
@endsection

@section("footerscript")
<script>
  $(document).ready(function(){
      $('#lightgallery').lightGallery(); 
  });
</script>
<script src="assets/js/gallery_box.js"></script>
@endsection
