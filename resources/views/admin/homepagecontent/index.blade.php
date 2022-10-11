@extends('admin.dashboard')
@section('pagetitle')
Home Page Content List
@endsection
@section('pagebc')
@can('create-data') 
<a href="{{ route('admin.homePageContent.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
@endcan
@cannot('create-data') 
<li class="breadcrumb-item"><a href="{{ route('admin.gallerys.index') }}">Home Page Contents</a></li>
<li class="breadcrumb-item active">Home Page Content List</li>
@endcannot

@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                @can('edit-data')  
                                                    <th style="width:5%"></th>
                                                @endcan
                                                @can('delete-data')
                                                    <th style="width:5%"></th>
                                                    <th style="width:5%"></th>
                                                @endcan
                                                <th style="width:5%">#</th>
                                                <th>First Title</th>
                                                <th>Second Title</th>
                                                <th>School Count</th>
                                                <th>Review Count</th>
                                                <th>Note Count</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($contents as $content)
                                            <tr id="tr_{{ $content->id }}" class="@if($content->status == 0)  deactive @endif">
                                                @can('edit-data')  
                                                <td class="align-middle">
                                                <a href="{{ route('admin.homePageContent.edit',$content->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit font-size-18"></i></a>
                                                </td>
                                                @endcan
                                                @can('delete-data')
                                                <td class="align-middle">
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                                                     deleteRecord({{ $content->id }});"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                    <form id="delete-form-{{ $content->id }}" action="{{ route('admin.homePageContent.destroy',$content->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE')}}
                                                    </form>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="custom-control custom-switch mb-2" dir="ltr">
                                                        <input type="checkbox" class="custom-control-input" id="recdis_{{ $content->id }}" @if($content->status == 1)  checked @endif value="1"  onclick="disableRecord({{ $content->id }},this);">
                                                        <label class="custom-control-label" for="recdis_{{ $content->id }}"></label>
                                                    </div>
                                                </td> 
                                                @endcan
                                                <td class="align-middle">{{ $content->id }}</td>
                                                <td class="align-middle">{{ $content->banner1_title1 }}</td>
                                                <td class="align-middle">{{ $content->banner1_title2 }}</td>
                                                <td class="align-middle">{{ $content->school_count }}</td>
                                                <td class="align-middle">{{ $content->review_count }}</td>
                                                <td class="align-middle">{{ $content->note_count }}</td>
                                                {{-- <td class="align-middle">{{ $content->url_slug }}</td>
                                                <td class="align-middle text-center">{{ $content->disp_order }}</td>
                                                <td class="align-middle">
                                                    @if($content->thump_image)
                                                    <a href="{{ url('storage/gallerys/'.$content->thump_image) }}" target="_blank"><img src="{{ url('storage/gallerys/'.$content->thump_image) }}" class="img-thumbnail" style="width: 50px;"></a>
                                                    @endif
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                            </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('Success'))
<div class="alert alert-success" role="alert" >
    {{ session('Success') }}
</div>
@endif

@endsection

@section("footerscript")

<script>
    function deleteRecord(id) {
        Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {
                if(t.value) {
                    document.getElementById("delete-form-" + id).submit(); 
                }
            })
    }


    function disableRecord(id,chkbox) {
        var status = 1;
        var _token = "{{ csrf_token() }}";

        if($(chkbox).is(":checked")){
            status = 1;
        }
        else if($(chkbox).is(":not(:checked)")){
            status = 0;
        }

        $.ajax({
            url:"{{ route('admin.homePageContent.changeStatus') }}",
            method: "POST",
            data: {id:id, status:status , _token:_token},
            success: function (result) {
                if(result=="Success") {
                    if(status ==1) {
                        $("#tr_"+id).removeClass("deactive");
                    }
                    else {
                        $("#tr_"+id).addClass("deactive");
                    }
                }
            },
            error: function (ts) {

            }
        });
    }

    
</script>

@endsection