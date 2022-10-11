@extends('admin.dashboard')
@section('pagetitle')
New Course
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Manage Course</a></li>
<li class="breadcrumb-item active">New Course</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Main Category Name</label>
                            <div class="col-md-10">
                                <select name="catg_id" id="catg_id" class="form-control @error('catg_id') is-invalid @enderror dynamic"  required  autofocus data-dependent="sub_catg_id">
                                    <option value=""></option>
                                @foreach($maincategory as $maincatg)
                                    <option value={{ $maincatg->id }}
                                    @if( old('catg_id') == $maincatg->id) {{ " selected " }} @endif
                                    >{{ $maincatg->catg_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>          

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Sub Category Name</label>
                            <div class="col-md-10">
                                <select name="sub_catg_id" id="sub_catg_id" class="form-control @error('sub_catg_id') is-invalid @enderror"   autofocus>
                                    <option value=""></option>

                                </select>
                            </div>
                        </div>    

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Course Code</label>
                            <div class="col-md-10">
                                <input id="product_code" type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" value="{{ old('product_code') }}" required autocomplete="product_code" autofocus>
                                @error('product_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Course Name</label>
                            <div class="col-md-10">
                                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Short Description(Banner highlighted)</label>  
                            <div class="col-md-10">
                                <textarea id="short_description" class="form-control @error('short_description') is-invalid @enderror" name="short_description" autocomplete="short_description" autofocus>{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Long Description(about course)</label>
                            <div class="col-md-10">
                                <textarea id="long_description" class="form-control @error('long_description') is-invalid @enderror" name="long_description" autocomplete="long_description" autofocus>{{ old('long_description') }}</textarea>
                                @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Value</label>
                            <div class="col-md-10">
                                <input id="product_value" type="number" step="any" class="form-control   col-lg-2 col-md-2 col-sm-12  @error('product_value') is-invalid @enderror" name="product_value" value="{{ old('product_value') }}" autocomplete="product_value" autofocus>
                                @error('product_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tutor</label>
                            <div class="col-md-10">
                                <select name="tutor_id" id="tutor_id" class="form-control @error('tutor_id') is-invalid @enderror dynamic"  required  autofocus data-dependent="tutor_id">
                                    <option value=""></option>
                                @foreach($tutors as $tutor)
                                    <option value={{ $tutor->id }}
                                    @if( old('tutor_id') == $tutor->id) {{ " selected " }} @endif
                                    >{{ $tutor->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Start Date(banner date)</label>
                            <div class="col-md-10">
                                <input id="start_date" type="date" step="any" class="form-control   col-lg-2 col-md-2 col-sm-12  @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" autocomplete="start_date" autofocus required>
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">End Date</label>
                            <div class="col-md-10">
                                <input id="end_date" type="date" step="any" class="form-control   col-lg-2 col-md-2 col-sm-12  @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" autocomplete="end_date" autofocus>
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">URL Slug(valid)</label>
                            <div class="col-md-10">
                                <input id="url_slug" type="text" class="form-control @error('url_slug') is-invalid @enderror" name="url_slug" value="{{ old('url_slug') }}" required autocomplete="url_slug" autofocus>
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
                                <input id="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ old('keywords') }}"  autocomplete="keywords" autofocus>
                                @error('keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Display Order</label>
                            <div class="col-md-10">
                                <input id="disp_order" type="number" class="form-control @error('disp_order') is-invalid @enderror" name="disp_order" value="{{ old('disp_order') }}"  style="width:100px" autocomplete="disp_order" autofocus>
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
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="thump_alt" type="text" class="form-control @error('thump_alt') is-invalid @enderror" name="thump_alt" value="{{ old('thump_alt') }}"   autocomplete="thump_alt" autofocus>
                                @error('thump_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Image 1(course inner image)</label>
                            <div class="col-md-10">
                                <input id="image1" type="file" accept=".jpg" class="form-control @error('image1') is-invalid @enderror" name="image1"  autofocus>
                                @error('image1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>        
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image1_alt" type="text" class="form-control @error('image1_alt') is-invalid @enderror" name="image1_alt" value="{{ old('image1_alt') }}"  autocomplete="image1_alt" autofocus>
                                @error('image1_alt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Image 2(course banner image)</label>
                            <div class="col-md-10">
                                <input id="image2" type="file" accept=".jpg" class="form-control @error('image2') is-invalid @enderror" name="image2"  autofocus>
                                @error('image2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image2_alt" type="text" class="form-control @error('image2_alt') is-invalid @enderror" name="image2_alt" value="{{ old('image2_alt') }}"  autocomplete="image2_alt" autofocus>
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
                            </div>
                        </div>                
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image3_alt" type="text" class="form-control @error('image3_alt') is-invalid @enderror" name="image3_alt" value="{{ old('image3_alt') }}"   autocomplete="image3_alt" autofocus>
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
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image4_alt" type="text" class="form-control @error('image4_alt') is-invalid @enderror" name="image4_alt" value="{{ old('image4_alt') }}"   autocomplete="image4_alt" autofocus>
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
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ALT</label>
                            <div class="col-md-10">
                                <input id="image5_alt" type="text" class="form-control @error('image5_alt') is-invalid @enderror" name="image5_alt" value="{{ old('image5_alt') }}"   autocomplete="image5_alt" autofocus>
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

@section('footerscript')
<script>

    $(document).ready(function() {
        tinymce.init({
            selector: "textarea#long_description",
            height: 600,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

</script>

<script>
    $(document).ready(function() {
        $('.dynamic').change(function(){
            if($(this).val() != '' ) {
                var select = $(this).attr('id');
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{ route('productsubcategories.fetch') }}",
                    method: "POST",
                    data: {select:select, value:value, dependent:dependent, _token:_token},
                    success: function (result) {
                        console.log(result);
                        
                        var obj = JSON.parse(result);
                        var len = obj.length;
                        $("#"+dependent).empty();
                        $("#"+dependent).append("<option value='0'>Select</option>");
                        
                        for( var i = 0; i<len; i++){
                            var id = obj[i]['id'];
                            var name = obj[i]['sub_catg_name'];
                            $("#"+dependent).append("<option value='"+id+"'>"+ name +"</option>");
                        }
                    },
                    error: function (ts) {

                    }
                });

            }
        });
    });
</script>
@endsection