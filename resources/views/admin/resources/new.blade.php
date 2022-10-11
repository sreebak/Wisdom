@extends('admin.dashboard')
@section('pagetitle')
New Resource
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.resources.index') }}">Manage Resource</a></li>
<li class="breadcrumb-item active">New Resource</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.resources.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
   
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Owner</label>
                            <div class="col-md-10">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ old('owner') }}" autocomplete="owner" autofocus>
                                @error('owner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Start Date</label>
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
                            <label class="col-md-2 col-form-label">Views</label>
                            <div class="col-md-10">
                                <input id="view" type="text" class="form-control @error('view') is-invalid @enderror" name="view" value="{{ old('view') }}" autocomplete="view" autofocus>
                                @error('view')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     
  

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">File </label>
                            <div class="col-md-10">
                                <input id="file" type="file" accept="pdf,xlsx,csv,doc" class="form-control @error('file') is-invalid @enderror" name="file"  autofocus required>
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>        
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Course</label>
                            <div class="col-md-10">
                                <select name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror dynamic"  required  autofocus data-dependent="sub_course_id">
                                    <option value=""></option>
                                @foreach($courses as $course)
                                    <option value={{ $course->id }}
                                    @if( old('course_id') == $course->id) {{ " selected " }} @endif
                                    >{{ $course->product_name }}</option>
                                @endforeach
                                </select>
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
            selector: "textarea#description",
            height: 300,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

</script>
@endsection