@extends('admin.dashboard')
@section('pagetitle')
Edit Service Category
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.sercategories.index') }}">Manage Categories</a></li>
<li class="breadcrumb-item active">Edit Category</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.sercategories.update',$sercatg) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Category Name</label>
                            <div class="col-md-10">
                                <input id="catg_name" type="text" class="form-control @error('catg_name') is-invalid @enderror" name="catg_name" value="{{ $sercatg->catg_name }}" required autocomplete="catg_name" autofocus>
                                @error('catg_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">URL Slug</label>
                            <div class="col-md-10">
                                <input id="url_slug" type="text" class="form-control @error('url_slug') is-invalid @enderror" name="url_slug" value="{{ $sercatg->url_slug }}" required autocomplete="url_slug" autofocus>
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
                                <input id="disp_order" type="number" class="form-control @error('disp_order') is-invalid @enderror" name="disp_order" value="{{ $sercatg->disp_order }}"  style="width:100px" autocomplete="disp_order" autofocus>
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

                                @if($sercatg->image)
                                <img src="{{ url('../storage/sercatg/'.$sercatg->image) }}" class="img-thumbnail" style="width: 100px;">
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

@endsection