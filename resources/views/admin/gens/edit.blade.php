@extends('admin.dashboard')
@section('pagetitle')
General Settings
@endsection
@section('pagebc')
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.general.update',$gens) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Website Title</label>
                            <div class="col-md-10">
                                <input id="webtitle" type="text" class="form-control @error('webtitle') is-invalid @enderror" name="webtitle" value="{{ $gens->webtitle }}" required  autocomplete="webtitle" autofocus>
                                @error('webtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="description" style="height:100px" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ $gens->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Keywords</label>
                            <div class="col-md-10">
                                <textarea id="keywords" style="height:100px" class="form-control @error('keywords') is-invalid @enderror" name="keywords" autocomplete="keywords" autofocus>{{ $gens->keywords }}</textarea>
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
                                <textarea id="metatags" style="height:400px" class="form-control @error('metatags') is-invalid @enderror" name="metatags" autocomplete="metatags" autofocus>{{ $gens->metatags }}</textarea>
                                @error('metatags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
    

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Google Analytics Code</label>
                            <div class="col-md-10">
                                <textarea id="google_analy" style="height:200px" class="form-control @error('google_analy') is-invalid @enderror" name="google_analy" autocomplete="google_analy" autofocus>{{ $gens->google_analy }}</textarea>
                                @error('google_analy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Google Map (iframe)</label>
                            <div class="col-md-10">
                                <textarea id="google_map" style="height:200px" class="form-control @error('google_map') is-invalid @enderror" name="google_map" autocomplete="google_map" autofocus>{{ $gens->google_map }}</textarea>
                                @error('google_map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone # 1</label>
                            <div class="col-md-10">
                                <input id="phone1" type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ $gens->phone1 }}"  autocomplete="phone1" autofocus>
                                @error('phone1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Phone # 2</label>
                            <div class="col-md-10">
                                <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ $gens->phone2 }}"  autocomplete="phone2" autofocus>
                                @error('phone2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email # 1</label>
                            <div class="col-md-10">
                                <input id="email1" type="text" class="form-control @error('email1') is-invalid @enderror" name="email1" value="{{ $gens->email1 }}"  autocomplete="email1" autofocus>
                                @error('email1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email # 2</label>
                            <div class="col-md-10">
                                <input id="email2" type="text" class="form-control @error('email2') is-invalid @enderror" name="email2" value="{{ $gens->email2 }}"  autocomplete="email2" autofocus>
                                @error('email2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Website</label>
                            <div class="col-md-10">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $gens->website }}"  autocomplete="website" autofocus>
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <textarea id="address" style="height:200px" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address" autofocus>{{ $gens->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Facebook</label>
                            <div class="col-md-10">
                                <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $gens->facebook }}"  autocomplete="facebook" autofocus>
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Instagram</label>
                            <div class="col-md-10">
                                <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $gens->twitter }}"  autocomplete="twitter" autofocus>
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Linkedin</label>
                            <div class="col-md-10">
                                <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ $gens->linkedin }}"  autocomplete="linkedin" autofocus>
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Youtube</label>
                            <div class="col-md-10">
                                <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ $gens->youtube }}"  autocomplete="youtube" autofocus>
                                @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Google</label>
                            <div class="col-md-10">
                                <input id="google" type="text" class="form-control @error('google') is-invalid @enderror" name="google" value="{{ $gens->google }}"  autocomplete="google" autofocus>
                                @error('google')
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

@if(session('Success'))
<div class="alert alert-success" role="alert" >
    {{ session('Success') }}
</div>
@endif


@endsection
