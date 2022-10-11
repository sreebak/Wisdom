@extends('admin.dashboard')
@section('pagetitle')
Edit Feedback
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.feedbacks.index') }}">Manage Feedback</a></li>
<li class="breadcrumb-item active">Edit Feedback</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.feedbacks.update',$feedback) }}" method="POST"
                    enctype='multipart/form-data'>
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{$feedback->name }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Message</label>
                        <div class="col-md-10">
                            <textarea id="message" class="form-control @error('message') is-invalid @enderror"
                                name="message" autocomplete="message"
                                autofocus>{{$feedback->message}}</textarea>
                            @error('message')
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
<div class="alert alert-danger" role="alert">
    {{ session('Error') }}
</div>
@endif

@endsection

@section("footerscript")
<script>
    $(document).ready(function () {
        tinymce.init({
            selector: "textarea#message",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

</script>
@endsection
