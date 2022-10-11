@extends('admin.dashboard')
@section('pagetitle')
Edit Blogs
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Manage Blogs</a></li>
<li class="breadcrumb-item active">Edit Blogs</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.blogs.update',$blogs) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Category Name</label>
                            <div class="col-md-10">
                                <select name="catg_id" id="catg_id" class="form-control @error('catg_id') is-invalid @enderror dynamic"  required  autofocus data-dependent="sub_catg_id">
                                    <option value=""></option>
                                @foreach($maincategory as $maincatg)
                                    <option value={{ $maincatg->id }}
                                    @if( $blogs->catg_id == $maincatg->id) {{ " selected " }} @endif
                                    >{{ $maincatg->catg_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Blog Title</label>
                            <div class="col-md-10">
                                <input id="blog_title" type="text" class="form-control @error('blog_title') is-invalid @enderror" name="blog_title" value="{{ $blogs->blog_title }}" required autocomplete="blog_title" autofocus>
                                @error('sub_catg_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Blog Date</label>
                            <div class="col-md-10">
                                <input id="blog_date" type="date" class="form-control col-lg-3 col-md-3 col-sm-12  @error('blog_date') is-invalid @enderror" name="blog_date" value="{{ $blogs->blog_date }}" required autocomplete="blog_date" autofocus>
                                @error('blog_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Short Description</label>
                            <div class="col-md-10">
                                <textarea id="short_description" class="form-control @error('short_description') is-invalid @enderror" name="short_description" autocomplete="short_description" autofocus>{{ $blogs->short_description }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Blog Content</label>
                            <div class="col-md-10">
                                <textarea id="blog_content" class="form-control @error('blog_content') is-invalid @enderror" name="blog_content" autocomplete="blog_content" autofocus>{{ $blogs->blog_content }}</textarea>
                                @error('blog_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">URL Slug</label>
                            <div class="col-md-10">
                                <input id="url_slug" type="text" class="form-control @error('url_slug') is-invalid @enderror" name="url_slug" value="{{ $blogs->url_slug }}" autocomplete="url_slug" autofocus>
                                @error('url_slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Keywords</label>
                            <div class="col-md-10">
                                <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ $blogs->keywords }}" autocomplete="keywords" autofocus>
                                @error('keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Meta Tags</label>
                            <div class="col-md-10">
                                <textarea id="metatags" style="height: 200px;"  class="form-control @error('metatags') is-invalid @enderror" name="metatags" autocomplete="metatags" autofocus>{{ $blogs->metatags }}</textarea>
                                @error('metatags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Display Order</label>
                            <div class="col-md-10">
                                <input id="disp_order" type="number" class="form-control @error('disp_order') is-invalid @enderror" name="disp_order" value="{{ $blogs->disp_order }}"  style="width:100px" autocomplete="disp_order" autofocus>
                                @error('disp_order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Thump Image</label>
                            <div class="col-md-10">
                                <input id="thump_image" type="file" accept=".jpg" class="form-control @error('thump_image') is-invalid @enderror" name="thump_image"  autofocus>
                                @error('thump_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($blogs->thump_image)
                                <img src="{{ url('../storage/blogs/'.$blogs->thump_image) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="thump_alt" type="text" class="form-control @error('thump_alt') is-invalid @enderror" name="thump_alt" value="{{ $blogs->thump_alt }}"   autocomplete="thump_alt" autofocus>
                                @error('thump_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Image 1</label>
                            <div class="col-md-10">
                                <input id="image1" type="file" accept=".jpg" class="form-control @error('image1') is-invalid @enderror" name="image1"  autofocus>
                                @error('image1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($blogs->image1)
                                <img src="{{ url('../storage/blogs/'.$blogs->image1) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>      
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image1_alt" type="text" class="form-control @error('image1_alt') is-invalid @enderror" name="image1_alt" value="{{ $blogs->image1_alt }}"  autocomplete="image1_alt" autofocus>
                                @error('image1_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                         

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Image 2</label>
                            <div class="col-md-10">
                                <input id="image2" type="file" accept=".jpg" class="form-control @error('image2') is-invalid @enderror" name="image2"  autofocus>
                                @error('image2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($blogs->image2)
                                <img src="{{ url('../storage/blogs/'.$blogs->image2) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>     

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image2_alt" type="text" class="form-control @error('image2_alt') is-invalid @enderror" name="image2_alt" value="{{ $blogs->image2_alt }}"  autocomplete="image2_alt" autofocus>
                                @error('image2_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                         


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Image 3</label>
                            <div class="col-md-10">
                                <input id="image3" type="file" accept=".jpg" class="form-control @error('image3') is-invalid @enderror" name="image3"  autofocus>
                                @error('image3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($blogs->image3)
                                <img src="{{ url('../storage/blogs/'.$blogs->image3) }}" class="img-thumbnail" style="width: 100px;">
                                @endif                                
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image3_alt" type="text" class="form-control @error('image3_alt') is-invalid @enderror" name="image3_alt" value="{{ $blogs->image3_alt }}"   autocomplete="image3_alt" autofocus>
                                @error('image3_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                         


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Image 4</label>
                            <div class="col-md-10">
                                <input id="image4" type="file" accept=".jpg" class="form-control @error('image4') is-invalid @enderror" name="image4"  autofocus>
                                @error('image4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($blogs->image4)
                                <img src="{{ url('../storage/blogs/'.$blogs->image4) }}" class="img-thumbnail" style="width: 100px;">
                                @endif                                
                            </div>
                        </div>            
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image4_alt" type="text" class="form-control @error('image4_alt') is-invalid @enderror" name="image4_alt" value="{{ $blogs->image4_alt }}"   autocomplete="image4_alt" autofocus>
                                @error('image4_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                         



                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Image 5</label>
                            <div class="col-md-10">
                                <input id="image5" type="file" accept=".jpg" class="form-control @error('image5') is-invalid @enderror" name="image5"  autofocus>
                                @error('image5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($blogs->image5)
                                <img src="{{ url('../storage/blogs/'.$blogs->image5) }}" class="img-thumbnail" style="width: 100px;">
                                @endif                                
                            </div>
                        </div>      

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image5_alt" type="text" class="form-control @error('image5_alt') is-invalid @enderror" name="image5_alt" value="{{ $blogs->image5_alt }}"   autocomplete="image5_alt" autofocus>
                                @error('image5_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

@endsection

@section("footerscript")
<script>

    $(document).ready(function() {
        tinymce.init({
            selector: "textarea#blog_content",
            height: 600,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

</script>
@endsection