@extends("website.theme.layout")
@section('mystyles')

@endsection
@section('header-section')

@endsection


@section("content")
<!-- main open \\ -->
<section>
    <div class="container-fluid bg_color_blue study_resources">
        <h1 class="pb-2">
            Search over 10,000 free study notes
        </h1>
        <h4>
            Over a million Career seekers use our free study notes to help them with their homework
        </h4>
    </div>
</section>
<section>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="row pt-4">
                    <div class="col-sm-4 col-12">
                        <h4>
                            Recents
                        </h4>

                    </div>
                    <div class="col-sm-8 col-12">
                        <form action="{{route('resource')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-10 col-8">
                                    <select class="all_subject_select" name="course_id" id="course_id">
                                        <option value="">Select a Course</option>
                                        @forelse ($courses as $item)
                                        <option value="{{$item->id}}"@isset($selectedcourse)
                                            @if($selectedcourse==$item->id) {{ " selected " }} @endif
                                            @endisset>{{$item->product_name}}</option>
                                        @empty
                                        <option value="">Select a Course</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-sm-2 col-4">
                                    <button type="submit" class="btn btn-outline-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>

                

                @forelse ($resources as $item)
                <div class="col-md-12 col-12 pt-3">
                    <a href="#">
                        <h5>
                            {{$item->title}}
                        </h5>
                        <p>
                            {!!$item->description!!}
                        </p>
                    </a>

                    <div class="row pb-3">
                        <div class="col-sm-12 col-3">
                            <a href="{{asset('storage/resource/'.$item->file)}}" target="_blank">{{$item->file}}</a>
                        </div>
                    </div>
                    <hr>
                </div>
                @empty
                <div class="col-md-12 col-12 pt-3">
                    <a href="#">
                        <h5>
                            No resources yet
                        </h5>
                       
                    </a>

                    {{-- <div class="row pb-3">
                        <div class="col-sm-1 col-3">
                            <img src="assets/image/review_icon.png" style="height: 30px;">
                        </div>
                    </div> --}}
                    <hr>
                </div>
                @endforelse
            </div>



            <div class="col-md-4 col-12">
                <div class="need_help mt-5 mb-5">
                    <div class="text-center pt-5 pb-3">
                        <img src="assets/svg/need-help-with.svg" style="height: 110px;">
                    </div>
                    <h4 class="pt-4 pb-2">
                        Need help with Devops?
                    </h4>
                    <p>
                    Are you finding it tough to understand DevOps? Need clarification and want to explore more about any concept related to DevOps? Confused with Git, Jenkins, Docker, Puppet, Ansible, etc.? 
                    </p>
                    <p>
                    Talk to our Expert DevOp Tutors who will guide you and help you in understanding the concept in detail till you are 100% satisfied. Check out the list of Tutors available at DevOps Academia, click to select the tutor of your choice and discuss with them anything regarding DevOps. 
                    </p>
                    <div class="text-center pb-4">
                        <a class="r_button r_button--xl r_button--primary" href="javascript:void(0)" data-toggle="modal"
                        data-target="#contactModal" onclick="return $('#contact-form')[0].reset()"> SPEAK TO DEVOPS EXPERTS </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main end  -->
@endsection

@section("footerscript")
@endsection
