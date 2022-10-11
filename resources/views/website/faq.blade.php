@extends("website.theme.layout")
@section('mystyles')
<style>
    * {
        box-sizing: border-box;
    }
    
    form.example_mytu input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }
    
    form.example_mytu button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 14px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }
    
    form.example_mytu button:hover {
        background: #0b7dda;
    }
    
    form.example_mytu::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
@endsection

@section('header-section')
@endsection


@section("content")
 <!-- main open \\ -->
 <section class="pt-5 faq_section" style="background-color: #cbc7ff;">
    <div class="container-fluid pt-5">
        <div class="row justify-content-md-center">
            <!-- <div class="col-12">
                <div class="d-flex align-items-center justify-content-center" style="height: 350px">
                    <div class="col-12">
                        <h1 class="text-center">
                            How can we help?

                        </h1>

                        <form class="example_mytu" style=" margin-left: 28%;
                        width: 500px;
                        margin-top: 20px;" action="#">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>


                </div>
            </div> -->


            <div style="height: 350px">
                <div class="col-12 ">
                    <h1 class="text-center">
                        How can we help?

                    </h1>

                    <form class="example_mytu" action="#">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>


            </div>



        </div>
    </div>
</section>

<section class="pb-5">
    <div class="container pt-5">
        <div class="row row_myt ">
            <div class="col-sm-4 row_col_myt col-12 text-center">
                <div class="faq_box">
                    <img src="assets/image/faq-01.png" class="img-fluid">

                    <h4 class="faq_h4"> Technical Support</h4>
                </div>
            </div>
            <div class="col-sm-4 row_col_myt col-12 text-center">
                <div class="faq_box">
                    <img src="assets/image/faq-02.png" class="img-fluid">

                    <h4 class="faq_h4"> Help for Parents and Students</h4>

                </div>
            </div>
            <div class="col-sm-4 row_col_myt col-12 text-center">
                <div class="faq_box">


                    <h4 class="faq_h4 pt-5"> Help for Tutors</h4>

                </div>
            </div>
            <div class="col-sm-12 row_col_myt col-12 text-center mt-5">


                <div class="faq_box">


                    <h4 class="faq_h4"> Summer Courses</h4>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="mb-5">
    <div class="container">
        <h5>
            Promoted articles
        </h5>

        <div class="row">
            <div class="col-sm-4 col-2">
                <a href="#">

Quick fixes
          
</a>
                <hr>
            </div>

            <div class="col-sm-8 col-2">
                <a href="#">

              
            Does a graphics tablet work with the lesson space?
          
                              
                </a>
                <hr>
            </div>
        </div>
    </div>
</section>

<!-- main end  -->
@endsection

@section("footerscript")
@endsection
