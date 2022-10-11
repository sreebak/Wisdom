@extends('admin.dashboard')
@section('pagetitle')
New Useful Link
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.usefullinks.index') }}">Manage Links</a></li>
<li class="breadcrumb-item active">New Useful Link</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.usefullinks.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Link Name</label>
                            <div class="col-md-10">
                                <input id="link_name" type="text" class="form-control @error('link_name') is-invalid @enderror" name="link_name" value="{{ old('link_name') }}" required autocomplete="link_name" autofocus>
                                @error('link_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Link URL</label>
                            <div class="col-md-10">
                                <input id="link_url" type="text" class="form-control @error('link_url') is-invalid @enderror" name="link_url" value="{{ old('link_url') }}" required autocomplete="link_url" autofocus>
                                @error('link_url')
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
