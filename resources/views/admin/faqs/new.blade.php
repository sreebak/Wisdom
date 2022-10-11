@extends('admin.dashboard')
@section('pagetitle')
New FAQ
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">Manage FAQ</a></li>
<li class="breadcrumb-item active">New FAQ</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.faqs.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
   
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Question</label>
                            <div class="col-md-10">
                                <textarea id="question" class="form-control @error('question') is-invalid @enderror" name="question"  autocomplete="question" autofocus>{{ old('question') }}</textarea>
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Answer</label>
                            <div class="col-md-10">
                                <textarea id="answer" class="form-control @error('answer') is-invalid @enderror" name="answer"  autocomplete="answer" autofocus>{{ old('answer') }}</textarea>
                                @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-md-2 col-form-label">Display Order</label>
                            <div class="col-md-10">
                                <input id="disp_order" type="number" class="form-control  col-lg-2 col-md-2 col-sm-12  @error('disp_order') is-invalid @enderror" name="disp_order" value="{{ old('disp_order') }}" autocomplete="disp_order" autofocus>
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

@section("footerscript")
<script>

    $(document).ready(function() {
        tinymce.init({
            selector: "textarea#question,textarea#answer",
            height: 300,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

</script>
@endsection