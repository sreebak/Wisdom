@extends('admin.dashboard')
@section('pagetitle')
Home Page Content
@endsection
@section('pagebc')
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.homePageContent.update',$content) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Banner-1 Title-1(Highlighted)</label>
                            <div class="col-md-10">
                                <input id="banner1_title1" type="text" class="form-control @error('banner1_title1') is-invalid @enderror" name="banner1_title1" value="{{ $content->banner1_title1 }}" required  autocomplete="banner1_title1" autofocus>
                                @error('banner1_title1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Banner-1 Title-2</label>
                            <div class="col-md-10">
                                <input id="banner1_title2" type="text" class="form-control @error('banner1_title2') is-invalid @enderror" name="banner1_title2" value="{{ $content->banner1_title2 }}" required  autocomplete="banner1_title2" autofocus>
                                @error('banner1_title2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Banner-1 Description</label>
                            <div class="col-md-10">
                                <textarea id="banner1_description" style="height:100px" class="form-control @error('banner1_description') is-invalid @enderror" name="banner1_description" autocomplete="banner1_description" autofocus>{{ $content->banner1_description }}</textarea>
                                @error('banner1_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">School Count</label>
                            <div class="col-md-10">
                                <input id="school_count" type="text" class="form-control @error('school_count') is-invalid @enderror" name="school_count" value="{{ $content->school_count }}" required  autocomplete="school_count" autofocus>
                                @error('school_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Review Count</label>
                            <div class="col-md-10">
                                <input id="review_count" type="text" class="form-control @error('review_count') is-invalid @enderror" name="review_count" value="{{ $content->review_count }}" required  autocomplete="review_count" autofocus>
                                @error('review_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Note Count</label>
                            <div class="col-md-10">
                                <input id="note_count" type="text" class="form-control @error('note_count') is-invalid @enderror" name="note_count" value="{{ $content->note_count }}" required  autocomplete="note_count" autofocus>
                                @error('note_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Banner-2 Title</label>
                            <div class="col-md-10">
                                <input id="banner2_title" type="text" class="form-control @error('banner2_title') is-invalid @enderror" name="banner2_title" value="{{ $content->banner2_title }}" required  autocomplete="banner2_title" autofocus>
                                @error('banner2_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Banner-2 Description</label>
                            <div class="col-md-10">
                                <textarea id="banner2_description" style="height:100px" class="form-control @error('banner2_description') is-invalid @enderror" name="banner2_description" autocomplete="banner2_description" autofocus>{{ $content->banner2_description }}</textarea>
                                @error('banner2_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Resources Title</label>
                            <div class="col-md-10">
                                <input id="resources_title" type="text" class="form-control @error('resources_title') is-invalid @enderror" name="resources_title" value="{{ $content->resources_title }}" required  autocomplete="resources_title" autofocus>
                                @error('resources_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Resources Description</label>
                            <div class="col-md-10">
                                <textarea id="resources_description" style="height:100px" class="form-control @error('resources_description') is-invalid @enderror" name="resources_description" autocomplete="resources_description" autofocus>{{ $content->resources_description }}</textarea>
                                @error('resources_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Google Description-1</label>
                            <div class="col-md-10">
                                <textarea id="google_description1" style="height:100px" class="form-control @error('google_description1') is-invalid @enderror" name="google_description1" autocomplete="google_description1" autofocus>{{ $content->google_description1 }}</textarea>
                                @error('google_description1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Google Description-2</label>
                            <div class="col-md-10">
                                <textarea id="google_description2" style="height:100px" class="form-control @error('google_description2') is-invalid @enderror" name="google_description2" autocomplete="google_description2" autofocus>{{ $content->google_description2 }}</textarea>
                                @error('google_description2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Banner Title</label>
                            <div class="col-md-10">
                                <input id="banner_title" type="text" class="form-control @error('banner_title') is-invalid @enderror" name="banner_title" value="{{ $content->banner_title }}" required  autocomplete="banner_title" autofocus>
                                @error('banner_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Button Label</label>
                            <div class="col-md-10">
                                <input id="button_label" type="text" class="form-control @error('button_label') is-invalid @enderror" name="button_label" value="{{ $content->button_label }}" required  autocomplete="button_label" autofocus>
                                @error('button_label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Banner Description</label>
                            <div class="col-md-10">
                                <textarea id="banner_description" style="height:100px" class="form-control @error('banner_description') is-invalid @enderror" name="banner_description" autocomplete="banner_description" autofocus>{{ $content->banner_description }}</textarea>
                                @error('banner_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Home Page Image1</label>
                            <div class="col-md-10">
                                <input id="homepage_image1" type="file" accept=".jpg" class="form-control @error('homepage_image1') is-invalid @enderror" name="homepage_image1"  autofocus>
                                @error('homepage_image1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($content->homepage_image1)
                                <img src="{{ url('../storage/homepageImages/'.$content->homepage_image1) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Home Page Image2</label>
                            <div class="col-md-10">
                                <input id="homepage_image2" type="file" accept=".jpg" class="form-control @error('homepage_image2') is-invalid @enderror" name="homepage_image2"  autofocus>
                                @error('homepage_image2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($content->homepage_image2)
                                <img src="{{ url('../storage/homepageImages/'.$content->homepage_image2) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>        
                        
                                       

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Home Page Image3</label>
                            <div class="col-md-10">
                                <input id="homepage_image3" type="file" accept=".jpg" class="form-control @error('homepage_image3') is-invalid @enderror" name="homepage_image3"  autofocus>
                                @error('homepage_image3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($content->homepage_image3)
                                <img src="{{ url('../storage/homepageImages/'.$content->homepage_image3) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>                        

                                              


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Home Page Image4</label>
                            <div class="col-md-10">
                                <input id="homepage_image4" type="file" accept=".jpg" class="form-control @error('homepage_image4') is-invalid @enderror" name="homepage_image4"  autofocus>
                                @error('homepage_image4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($content->homepage_image4)
                                <img src="{{ url('../storage/homepageImages/'.$content->homepage_image4) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>                
                        
                       

                                      
                      
                        

                        <div class="form-group row">
                            <div class="offset-md-2  col-md-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                        
                    </form>

            </div>
        </div>
    </div>
</div>

@if(session('Error'))
<div class="alert alert-danger" role="alert" >
    {{ session('Error') }}
</div>
@endif

@if(session('Success'))
<div class="alert alert-success" role="alert" >
    {{ session('Success') }}
</div>
@endif


@endsection

@section("footerscript")
<script>

    $(document).ready(function() {
        tinymce.init({
            selector: "textarea#banner1_description,textarea#banner2_description,textarea#resources_description,textarea#google_description1,textarea#google_description2,textarea#banner_description",
            height: 600,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

</script>
@endsection