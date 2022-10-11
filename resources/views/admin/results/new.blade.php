@extends('admin.dashboard')
@section('pagetitle')
New Result
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.results.index') }}">Manage Results</a></li>
<li class="breadcrumb-item active">New Result</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.results.store') }}" method="POST" enctype='multipart/form-data'>
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
                            <label class="col-md-2 col-form-label">File</label>
                            <div class="col-md-10">
                                <input id="file" type="file" accept=".pdf" class="form-control @error('file') is-invalid @enderror" name="file" autofocus>
                                @error('file')
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