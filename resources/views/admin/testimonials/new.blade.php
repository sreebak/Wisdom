@extends('admin.dashboard')
@section('pagetitle')
New Testimonial
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Manage Testimonials</a></li>
<li class="breadcrumb-item active">New Testimonial</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
   

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autocomplete="name" autofocus>
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
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" autocomplete="message" autofocus>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Company</label>
                            <div class="col-md-10">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}"  autocomplete="company" autofocus>
                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Designation</label>
                            <div class="col-md-10">
                                <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}"  autocomplete="designation" autofocus>
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Project Title</label>
                            <div class="col-md-10">
                                <input id="project_title" type="text" class="form-control @error('project_title') is-invalid @enderror" name="project_title" value="{{ old('project_title') }}"  autocomplete="project_title" autofocus>
                                @error('project_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Project Details</label>
                            <div class="col-md-10">
                            <textarea id="project_details" class="form-control @error('message') is-invalid @enderror" name="project_details" autocomplete="project_details" autofocus>{{ old('project_details') }}</textarea>    
                                @error('project_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Project Link</label>
                            <div class="col-md-10">
                                <input id="project_link" type="text" class="form-control @error('project_link') is-invalid @enderror" name="project_link" value="{{ old('project_link') }}"  autocomplete="project_link" autofocus>
                                @error('project_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Facebook</label>
                            <div class="col-md-10">
                                <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}"  autocomplete="facebook" autofocus>
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Twiter</label>
                            <div class="col-md-10">
                                <input id="twiter" type="text" class="form-control @error('twiter') is-invalid @enderror" name="twiter" value="{{ old('twiter') }}"  autocomplete="twiter" autofocus>
                                @error('twiter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Linkedin</label>
                            <div class="col-md-10">
                                <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ old('linkedin') }}"  autocomplete="linkedin" autofocus>
                                @error('linkedin')
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
                            <label class="col-md-2 col-form-label">Image</label>
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

@endsection