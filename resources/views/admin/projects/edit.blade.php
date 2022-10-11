@extends('admin.dashboard')
@section('pagetitle')
Edit Review
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Manage Review</a></li>
<li class="breadcrumb-item active">Edit Review</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.projects.update',$projects) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Main Category Name</label>
                            <div class="col-md-10">
                                <select name="catg_id" id="catg_id" class="form-control @error('catg_id') is-invalid @enderror dynamic"  required  autofocus data-dependent="sub_catg_id">
                                    <option value=""></option>
                                @foreach($maincategory as $maincatg)
                                    <option value={{ $maincatg->id }}
                                    @if( $projects->catg_id == $maincatg->id) {{ " selected " }} @endif
                                    >{{ $maincatg->catg_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Review Code</label>
                            <div class="col-md-10">
                                <input id="project_code" type="text" class="form-control col-lg-2 col-md-2 col-sm-12 @error('project_code') is-invalid @enderror" name="project_code" value="{{ $projects->project_code }}" required autocomplete="project_code" autofocus>
                                @error('project_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name(valid)</label>
                            <div class="col-md-10">
                                <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" value="{{ $projects->project_name }}" required autocomplete="project_name" autofocus>
                                @error('project_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Project Type</label>
                            <div class="col-md-10">
                                <input id="project_type" type="text" class="form-control @error('project_type') is-invalid @enderror" name="project_type" value="{{ $projects->project_type }}" required autocomplete="project_type" autofocus>
                                @error('project_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Sub title(valid)</label>
                            <div class="col-md-10">
                                <input id="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ $projects->client_name }}" required autocomplete="client_name" autofocus>
                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                    
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Location</label>
                            <div class="col-md-10">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ $projects->location }}" required autocomplete="location" autofocus>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Project Start Date</label>
                            <div class="col-md-10">
                                <input id="project_date1" type="date" class="form-control col-lg-3 col-md-3 col-sm-12  @error('project_date1') is-invalid @enderror" name="project_date1" value="{{ $projects->project_date1 }}"  autocomplete="project_date1" autofocus>
                                @error('project_date1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Project End Date</label>
                            <div class="col-md-10">
                                <input id="project_date2" type="date" class="form-control col-lg-3 col-md-3 col-sm-12  @error('project_date2') is-invalid @enderror" name="project_date2" value="{{ $projects->project_date2 }}"  autocomplete="project_date2" autofocus>
                                @error('project_date2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Short Description(valid)</label>
                            <div class="col-md-10">
                                <textarea id="short_description" class="form-control @error('short_description') is-invalid @enderror" name="short_description" autocomplete="short_description" autofocus>{{ $projects->short_description }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Long Description</label>
                            <div class="col-md-10">
                                <textarea id="long_description" class="form-control @error('long_description') is-invalid @enderror" name="long_description" autocomplete="long_description" autofocus>{{ $projects->long_description }}</textarea>
                                @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Project Value</label>
                            <div class="col-md-10">
                                <input id="project_value" type="number" step="any" class="form-control col-lg-2 col-md-2 col-sm-12  @error('project_value') is-invalid @enderror" name="project_value" value="{{ $projects->project_value }}" autocomplete="project_value" autofocus>
                                @error('project_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">URL Slug</label>
                            <div class="col-md-10">
                                <input id="url_slug" type="text" class="form-control @error('url_slug') is-invalid @enderror" name="url_slug" value="{{ $projects->url_slug }}" autocomplete="url_slug" autofocus>
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
                                <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ $projects->keywords }}" autocomplete="keywords" autofocus>
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
                                <textarea id="metatags" style="height: 200px;" class="form-control @error('metatags') is-invalid @enderror" name="metatags" autocomplete="metatags" autofocus>{{ $projects->metatags }}</textarea>
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
                                <input id="disp_order" type="number" class="form-control @error('disp_order') is-invalid @enderror" name="disp_order" value="{{ $projects->disp_order }}"  style="width:100px" autocomplete="disp_order" autofocus>
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
                                @if($projects->thump_image)
                                <img src="{{ url('../storage/projects/'.$projects->thump_image) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="thump_alt" type="text" class="form-control @error('thump_alt') is-invalid @enderror" name="thump_alt" value="{{ $projects->thump_alt }}"   autocomplete="thump_alt" autofocus>
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
                                @if($projects->image1)
                                <img src="{{ url('../storage/projects/'.$projects->image1) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>      
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image1_alt" type="text" class="form-control @error('image1_alt') is-invalid @enderror" name="image1_alt" value="{{ $projects->image1_alt }}"  autocomplete="image1_alt" autofocus>
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
                                @if($projects->image2)
                                <img src="{{ url('../storage/projects/'.$projects->image2) }}" class="img-thumbnail" style="width: 100px;">
                                @endif
                            </div>
                        </div>     

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image2_alt" type="text" class="form-control @error('image2_alt') is-invalid @enderror" name="image2_alt" value="{{ $projects->image2_alt }}"  autocomplete="image2_alt" autofocus>
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
                                @if($projects->image3)
                                <img src="{{ url('../storage/projects/'.$projects->image3) }}" class="img-thumbnail" style="width: 100px;">
                                @endif                                
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image3_alt" type="text" class="form-control @error('image3_alt') is-invalid @enderror" name="image3_alt" value="{{ $projects->image3_alt }}"   autocomplete="image3_alt" autofocus>
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
                                @if($projects->image4)
                                <img src="{{ url('../storage/projects/'.$projects->image4) }}" class="img-thumbnail" style="width: 100px;">
                                @endif                                
                            </div>
                        </div>            
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image4_alt" type="text" class="form-control @error('image4_alt') is-invalid @enderror" name="image4_alt" value="{{ $projects->image4_alt }}"   autocomplete="image4_alt" autofocus>
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
                                @if($projects->image5)
                                <img src="{{ url('../storage/projects/'.$projects->image5) }}" class="img-thumbnail" style="width: 100px;">
                                @endif                                
                            </div>
                        </div>      

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image5_alt" type="text" class="form-control @error('image5_alt') is-invalid @enderror" name="image5_alt" value="{{ $projects->image5_alt }}"   autocomplete="image5_alt" autofocus>
                                @error('image5_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                         


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">General Images</label>
                            <div class="col-md-10">
                                <input id="genimages" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="genimages[]" multiple>

                                @foreach($genimgs as $gikey=>$gimgs)
                                {{$gimgs}}
                                <div class="img-wrap" id="gimg_{{ $gikey }}">
                                    <img src="{{ url('../storage/projects/'. $gimgs) }}" class="img-thumbnail" style="width: 100px;">
                                    <a href="#" onclick="removefile('gimg_{{ $gikey }}','{{ $gimgs }}'); return false" title="Delete">Delete</a>
                                </div>
                                @endforeach
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
            selector: "textarea#long_description",
            height: 600,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

    function removefile(fileid,filetoremove) {
        if(filetoremove) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {
                if(t.value) {
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url:"{{ route('removeimagefile') }}",
                        method: "POST",
                        data: {storage:"projects",filetoremove:filetoremove, _token:_token},
                        success: function (result) {
                            $("#" + fileid).remove();
                        },
                        error: function (ts) {

                        }
                    });

                }
            })
            
        }
    }

</script>
@endsection