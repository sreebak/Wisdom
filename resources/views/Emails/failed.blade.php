@extends("website.theme.layout")

@section('header-section')
            <!-- BREADCRUMBS -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}" class="pathway"><span>Home</span></a></li>
                            <li><span class="text-white">Thanks</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- //BREADCRUMBS -->
@endsection

@section("content")
   <div class="container">
      <div class="row">
         <!-- MAIN CONTENT -->
         <div id="t3-content" class="t3-content col-sm-12" style="height:500px">

            <div class="text-center">
               <p>&nbsp;</p>
               <h4>SORRY.. Failed to send the email</h4>
            </div>

         </div>
         <!-- //MAIN CONTENT -->
      </div>
   </div>
@endsection

@section("footerscript")
<script src="assets/js/js-01/jquery.materialize-parallax.js" type="text/javascript"></script>
<script src="assets/js/js-01/about.js" type="text/javascript"></script>
@endsection