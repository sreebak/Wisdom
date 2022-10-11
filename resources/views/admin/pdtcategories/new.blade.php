@extends('admin.dashboard')
@section('pagetitle')
New Product Category
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.pdtcategories.index') }}">Manage Categories</a></li>
<li class="breadcrumb-item active">New Category</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.pdtcategories.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Category Name</label>
                            <div class="col-md-10">
                                <input id="catg_name" type="text" class="form-control @error('catg_name') is-invalid @enderror" name="catg_name" value="{{ old('catg_name') }}" required autocomplete="catg_name" autofocus>
                                @error('catg_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Short Description</label>
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
                            <label class="col-md-2 col-form-label">Long Description</label>
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
                            <label class="col-md-2 col-form-label">URL Slug</label>
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
                            <label class="col-md-2 col-form-label">Image</label>
                            <div class="col-md-10">
                                <input id="image" type="file" accept=".jpg" class="form-control @error('image') is-invalid @enderror" name="image" autofocus>
                                @error('image')
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

@endsection
